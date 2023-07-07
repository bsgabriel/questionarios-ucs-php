<?php
interface RespostaDAO
{
  public function inserir($oferta);
  public function alterar($oferta);
  public function remover($oferta);
  public function buscarPorId($id);
}