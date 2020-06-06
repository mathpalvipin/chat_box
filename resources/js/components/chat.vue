<template>
	
<div id="chatapp" >
	<div>{{user}}</div>
	<conversation :messages="messages" :contact="selectedcontact"   id="messages" @new="newmessage"></conversation>
	
	<contactlist :contacts="contacts" @selected="startedconversationwith" id="contact"></contactlist>
	
</div>
</div>



</template>
<script type="text/javascript">
	import conversation from './conversation';
	import contactlist from './contactlist';
	export default  {
		props:{
			user:{
				type:Object,
				required:false	
						}

		},
		data(){
			return {
				selectedcontact: null ,
				messages:[],
				contacts:[]
			};
		
	},
	mounted(){
		 Echo.private('messages.'+this.user.id)
		 .listen('NewMessage',(e)=>{
		 	console.log('messages.'+this.user.id);
		 	
		 	this.handleIncoming(e.message);

		 })
		axios.get('/contacts')
		.then((response)=>{
		
			
			this.contacts=response.data;

			
		});
		
	},
	methods:{    
		startedconversationwith:function(contact){
			this.updateunread(contact,true);
			axios.get('conversation/'+contact.id)
			.then((response)=>{
                 
				this.messages= response.data;
				this.selectedcontact=contact;
				
			});
		},
		newmessage(text){
			this.messages.push(text);
		},
		handleIncoming(message){
			 if(this.selectedcontact &&message.from==this.selectedcontact.id){
			 	
			 	 this.newmessage(message); 
			 	 return ;
			 }
			 this.updateunread(contact.from_contact,false);
			 
		},
		updateunread(contact,reset){
			 this.contact= this.contacts.map((single)=>{  if(single.id!=contact.id){
			 	return single;
			 }
			 if(reset)
			 	single.unread=0;
			 else single.unread+=1;
			 return single;
		})
		} 
       
		},
		components:{
			conversation,contactlist
		}
	}
</script>
<style type="text/css" scoped>
#chatapp{
	 display: flex;

}
	#messages{
		flex:5;  

	}
	#contact{
		 flex:2;
	}
</style>