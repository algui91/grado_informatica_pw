Para la realización de esta práctica se ha usado _sass_, concretamente con su sintáxis _scss_. He aquí un ejemplo:

```css
main {
  .new-container {

    margin-bottom: 20px;
    flex-basis: 100%;

    @include respond-to('small') {
      @include flex-grid-container('row wrap');
    }

    article {
      @include flex-grid-item($grow:1);
    }
  }

  #left-column {
    @include respond-to('large') {
      flex-basis: 70%;
   }
  }
}
```

Un aspecto no visto en clase ha sido el uso de la propiedad `flex`, que permite diseñar el aspecto de los elementos sin necesidad de usar `float`
