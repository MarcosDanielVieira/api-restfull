<?php

namespace App\Helpers;

/**
 *  Classe respresenta a lista de constantes para usar no sistema
 */
abstract class Constants
{

  const SUCCESS_LOGIN         = "Seja bem vindo ao processo sistema.";
  const SUCCESS_EMAIL         = "Seu e-mail foi confirmado!";
  const SUCCESS_ALTER_EMAIL   = "E-mail alterado com sucesso.";
  const SUCCESS_ALTER         = "Atualização realizada com sucesso.";
  const SUCCESS_REGISTER      = "Cadastro realizado sucesso.";
  const SUCCESS_VERIFY_EMAIL  = "Verifique seu e-mail para obter mais instruções.";
  const SUCCESS_DELETE        = "Registro deletado com sucesso.";
  const SUCCESS_UPLOAD        = "Foi efetuado upload corretamente.";
  const SUCCESS_ACTIVE        = "Ativação realizada com sucesso.";
  const SUCCESS_INACTIVE      = "Desativação realizada com sucesso.";

  const ERROR_LOGIN           = "E-mail ou senha não conferem.";
  const ERROR_TOKEN           = "Não foi possível verificar sua conta com o token fornecido.";
  const ERROR_ALTER           = "Não foi possível atualizar as informações.";
  const ERROR_REGISTER        = "Não foi possível cadastrar as informações.";
  const ERROR_VERIFY_EMAIL    = "Não foi possível redefinir a senha do endereço de e-mail fornecido.";
  const ERROR_DELETE          = "Não foi possível deletar o registro.";
  const ERROR_EMAIL           = "Seu e-mail não foi confirmado!";
  const ERROR_UPLOAD          = "Não foi efetuado upload corretamente.";
  const ERROR_SEARCH          = "Item de busca não encontrado.";
  const ERROR_ACCESS          = "Infelizmente você não possui acesso a essa função.";
  const ERORR_JSON            = "Existe informação faltando no json.";

  const STATUS_ACTIVE         = 0;
  const STATUS_INACTIVE       = 1;
  const STATUS_SUCCESS        = "Success";
  const STATUS_ERROR          = "Error";

  const PAGE_NUMBER           = 26;

  const DATE_AMERICANA        = "Y-m-d";
  const DATE_BRASILEIRA       = "d/m/Y";
  const HR_SEGUNDO            = "H:i";
  const DATE_BRASILEIRA_HR    = "d/m/Y H:i:s";
  const DATE_TIMESTAMP        = "Y-m-d H:i:s";
}
