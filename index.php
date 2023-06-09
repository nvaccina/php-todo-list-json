<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CSS-->
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!--Vue-->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!--Font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <title>To Do List</title>
</head>
<body>

  <div id="app" class="text-center">

    <div class="logo">
      <img src="to-do.png" alt="Logo To do list">
    </div>

    <div class="input-area">
      <input 
        v-model.trim="newTask"
        @keyup.enter="addTask"
        type="text" 
        placeholder="Inserisci un nuovo TO-DO"
      >

      <button @click="addTask" >AGGIUNGI</button>
    </div>

    <div>
      <span class="error">{{msgError}}</span>

      <span v-html="messageCheck" class="check"></span>
      
    </div>   

    <div class="nv_container">

      <div v-if="list.length == 0" >
        <h2>Non ci sono cose da fare
          <i class="fa-regular fa-face-smile-wink"></i>
        </h2>
        <span class="f-12">(Aggiungi un nuovo to-do dalla barra qui sopra)</span>
      </div>

      <ul class="list px-0">
        <li 
          v-for="(listItem, index) in list"
          :key="index"
          :class="{'done' : listItem.done}"
          @click="listItem.done = !listItem.done"
        > {{listItem.text}}
          <span
            @click.stop="deleteTask(index)"
          >
            <i 
              class="fa-regular fa-circle-xmark"
              
            ></i>
          </span>

        </li>
      </ul>
    </div>

  </div>

  <script src="main.js"></script>
  
</body>
</html>