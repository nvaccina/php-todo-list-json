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
      const data = new FormData();
      data.append('todo-text',this.newTask);

      axios.post(this.apiUrl, data)
      .then(result =>{
        this.newTask = '';
        this.list = result.data;
      })
    },
    deleteTask(index){
      const data = new FormData();
      data.append('taskToDelete', index);
      axios.post(this.apiUrl, data)
      .then(result => {
        this.list = result.data;
      })

    }



  },
  mounted(){
    this.readList();
  },

}).mount('#app');