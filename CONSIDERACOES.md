# Considerações
_Coisas que são assim mas não deveriam:_

#### HTTPS
  Em tese todas as rotas "seguras" deveriam forçar o uso de TLS.

#### REST
  Como o uso de cookies/sessão era obrigatório, não dá pra implementar um serviço _realmente_ RESTful.

#### Segurança
  O login e armazenamento de senhas é inseguro. Não tive tempo de implementar um sistema seguro de armazenamento de credenciais.

  Falta em especial um algoritmo melhor para armazenamento da senha. MD5 está praticamente descontinuado e falta o uso de um salt randomizado.
