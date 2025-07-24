# PHP Object Oriented Programming Learning

This branch was created to document everything I learn about OOP PHP.

---

## 📚 Table of Contents


---

## Classes & Objects

É recomendado criar um arquivo para cada classe e nomeá-las sempre com o nome do arquivo

Variáveis das classes são chamadas de propriedades e funções são chamadas de métodos

O object operator é o seguinte: `->`, é com ele que é possível acessar as propriedades e métodos de um objeto.

A propriedade cujo nenhum valor foi setado e foi definida com algum tipo terá o tipo "uninitialized(typename)", ex:

```php
public float $amount;
public string $description;
```
Output:

```javascript
object(Transaction)#1 (0) {
  ["amount"]=>
  uninitialized(float)
  ["description"]=>
  uninitialized(string)
}
```


## Constructor method

O método construtor é um método que é chamado sempre que é criada uma instância do objeto, é recomendado sempre colocar qual o modificador de acesso daquele método ou propriedade, por padrão, caso não escreva o modificador de acesso o php assume que seja public, mas não é bom deixar sem:
```php
public function __construct(float $amount, string $description)
{
    $this->amount = $amount;
    $this->description = $description;
}
```

