<?php
use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;
class Carrinho extends MY_Home{

  function index()
  {
    $this->data['title']                = 'Carrinho de compras';
    $this->data['carrinho']             = $this->session->carrinho;
    $this->data['valor_total_carrinho'] = $this->session->valor_total_carrinho;

    if (isset($_SESSION['carrinho'])) {
      $this->load->view('home/templates/header', $this->data);
      $this->load->view('home/templates/nav',$this->data);
      $this->load->view('home/carrinho/carrinho', $this->data);
      $this->load->view('home/templates/footer');
    }else
    {
      redirect();
    }
  }
  function adicionar_carrinho()
  {
    $this->load->model( 'admin_control/produtos_model');

    $dados['carrinho'] = $this->session->carrinho;
    $dados['valor_total_carrinho'] = $this->session->valor_total_carrinho;
    $existe_produto_carrinho = 0;
    if (count($dados['carrinho'])>0) {
      foreach ($dados['carrinho'] as $produto) {
          if ($produto['id'] == $this->uri->segment('3', 0)) {
            $existe_produto_carrinho++;
          }
      }
    }
    if ($existe_produto_carrinho === 0) {
      $produto                          =  $this->produtos_model->get_one_produto_carrinho();
      $produto[0]['array_id']           =  count($dados['carrinho']);
      $dados['carrinho'][]              =  $produto[0];
      $dados['valor_total_carrinho']   += $produto[0]['valor'];
      $this->session->set_userdata($dados);
    }
    redirect('');
  }
  public function remover_carrinho()
  {
    unset($_SESSION['carrinho'][$this->uri->segment('3', 0)]);
    $this->dados['carrinho'] = $this->session->carrinho;
    redirect('carrinho');
  }
  public function limpar_carrinho()
  {
    if (isset($_SESSION['carrinho'])) {
      $this->session->unset_userdata('carrinho');
      $this->session->unset_userdata('valor_total_carrinho');
    }
    redirect('');
  }
  public function gerar_boleto()
  {
    $data_compra = date('Y-m-d');
    $dados_carrinho = $this->session->valor_total_carrinho;

    $sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
    $cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');
    $boleto = new BancoDoBrasil(array(
        // Parâmetros obrigatórios
        'dataVencimento' => new DateTime($data_compra),
        'valor' => $dados_carrinho,
        'sequencial' => 1234567, // Para gerar o nosso número
        'sacado' => $sacado,
        'cedente' => $cedente,
        'agencia' => 1724, // Até 4 dígitos
        'carteira' => 18,
        'conta' => 10403005, // Até 8 dígitos
        'convenio' => 1234, // 4, 6 ou 7 dígitos
    ));

    echo $boleto->getOutput();
  }
}
