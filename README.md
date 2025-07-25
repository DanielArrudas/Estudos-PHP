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

É possível colocar como retorno de um método o nome da classe, assim o método vai retornar o próprio objeto que o chamou.

```php
public function applyDiscount(float $rate): Transaction
{
    $this->amount -= $this->amount * $rate / 100;
    
    return $this;
}
```

Com isso pode-se aplicar o "method chaining":

```php
$transaction = new Transaction(100, "descrição")
->addTax(5)
->applyDiscount(10);

//O objeto é instanciado e já chama o método addTax e o applyDiscount é chamado para o objeto retornado desse método
```

É possível também instanciar um objeto, chamar os métodos necessários e logo depois pegar o valor, "descartando" o objeto:

```php
$transaction = new Transaction(100, "descrição")
->addTax(5)
->applyDiscount(10);
->getAmount();
```