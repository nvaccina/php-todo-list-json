const {createApp} = Vue;

createApp({
  data(){
    return{
      apiUrl: 'server.php',
      list: [],
      newTask: '',
      msgError: '',
      messageCheck: '',
    }
  },
  methods:{
    readList(){
      axios.get(this.apiUrl)
      .then(result => {
        this.list = result.data;
      })
    },
    addTask(){
      if(this.newTask.length > 4){
        const data = new FormData();
        data.append('todo-text',this.newTask);
  
        axios.post(this.apiUrl, data)
        .then(result =>{
          this.newTask = '';
          this.list = result.data;
          this.hideMessageCheck('<i class="fa-regular fa-circle-check"></i>')
        })
      }else{
        this.hideMsgError('Attenzione!! Il testo inserito deve avere almeno 5 caratteri')
      }
    },
    deleteTask(index){
      if(this.list[index].done && confirm('Vuoi davvero eliminare questo elemento?')){
        const data = new FormData();
        data.append('taskToDelete', index);
        axios.post(this.apiUrl, data)
        .then(result => {
          this.list = result.data;
        })
      }else{
        this.hideMsgError('Attenzione!! Puoi eliminare questo elemento solo se è stato eseguito!')
      }
    },
    //funzione per il messaggio di errore
    hideMsgError(msg){
      this.msgError = msg;
      setTimeout(() => {
        this.msgError = '';
      },2000)
    },
    //funzione per far sparire il messaggio di check
    hideMessageCheck(message){
      this.messageCheck = message;
      setTimeout(() => {
        this.messageCheck = '';
      },2000)
    }

  },
  mounted(){
    this.readList();
  },

}).mount('#app');