# openssl
openssl实现ASE对称加解密和RSA非对称加解密

### 用openssl生成rsa密钥对(私钥/公钥):
openssl genrsa -out rsa_private_key.pem 1024
openssl rsa -pubout -in rsa_private_key.pem -out rsa_public_key.pem
