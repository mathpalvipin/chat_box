<template>
	<div class="conversation">
	   <h3>{{contact ?contact.name :'select contact'
	}}</h3>	

  
    

 <messages :contact='contact' :messagees="messages" id="messagesfeed"></messages>
  <messagecomposer  @send="sendMessage"></messagecomposer id="messagecomposer">


	</div>

</template>
<script >
     import messagecomposer from './messagecomposer';
	 import messages from './messages' ;

	export default {
   
  
		 props:{
           contact:{ 
           	type:Object,
           default: null
       },
       messages:{
       	 type: Array ,
       	 default:[]
		 }	
       },
       methods:{
       	sendMessage:function(text){
           if(!this.contact){
            return ;
           }
           axios.post('/conversation/send',{

            contact_id: this.contact.id,
            text :text
           }).then((response)=>{
            this.$emit('new',response.data); 
           })
       	}

       	},
       	 components:{
          messages,messagecomposer
       	 }
       }

		





</script>
<style type="text/css" scoped>
.conversation{height: 500px;
   display:  flex;
   flex-direction: column;
   justify-content: space-between;


}
  #messagesfeed{
     
    flex: 5;
  }
  #messagecomposer{
    flex: 2;
  }
  h3{
    border-bottom: 1px dashed lightgray; 
  }
</style>