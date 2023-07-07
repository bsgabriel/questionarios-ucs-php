<?php
interface SubmissaoDAO
{
  public function inserir($submissao);
  public function alterar($submissao);
  public function remover($submissao);
  public function buscarPorId($id);
  public function buscarPorOferta($id_oferta);
}