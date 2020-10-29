<template>
    <div class="container">
        <div>
            <h1>Add article</h1>
             <form  class="mb-3">
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="title" v-model="article.title">
                  </div>
                   <div class="form-group">
                      <textarea class="form-control" placeholder="body" v-model="article.body">
                      </textarea>
                  </div>
                  <hr>
                   <button @click.prevent="postarticle()" class="btn btn-primary btn-block">Submit</button>
                </form>
        </div>
        <h1>Article List</h1>
        <div class="card card-body mb-2" v-for="y in  articlelist"  v-bind:key="y"> 
          <h3>{{y.title}}</h3>
          <p>{{y.body}}</p>
          <hr>
          <button @click.prevent="deletearticle(y.id)" class="btn btn-danger">Delete</button>
          <button @click.prevent="editarticle(y)" class="btn btn-success mb-2">Edit</button>
        </div>
    </div>
</template>
<script>
export default {
    data:function(){
    return{
        articlelist:{},
        article:{
             'id':'',
            'title':'',
            'body':''
        },
        edit:false,
        article_id:''
    }
    },
    created(){
       this.getall()
    },
    methods:{
        //get all blogs
        getall:function(){
            fetch('api/list').then(res=>res.json())
            .then(res=>{
               // console.log(res)
                this.articlelist=res.data
            })
        },
        //deletearticle
        deletearticle:function(id){
          fetch(`api/list/${id}`,{
              method:'delete'
          }).then(res=>res.json())
          .then(res=>{
                this.getall()
          })
        },
        postarticle:function(){
           if(this.edit===false){
               //add
               fetch('api/add',{
                   method:'post',
                   body:JSON.stringify(this.article),
                   headers:{
                         'content-type':'application/json'
                   }}).then(res=>res.json())
                   .then(res=>{
                       this.article.title='';
                        this.article.body='';
                         this.getall()
                   })

           }
           else
           {
               //update
                 fetch('api/update',{
                   method:'put',
                   body:JSON.stringify(this.article),
                   headers:{
                         'content-type':'application/json'
                   }}).then(res=>res.json())
                   .then(res=>{
                       this.article.title='';
                        this.article.body='';
                         this.getall()
                   })

           }
        },
        //editarticle
        editarticle:function(article){
              this.edit=true;
              this.article.id=article.id;
              this.article.title=article.title;
              this.article.article_id=article.id;
              this.article.body=article.body;
        }
    }
}
</script>