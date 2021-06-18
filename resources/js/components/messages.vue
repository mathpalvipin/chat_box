<template>
	
	<div class="feed" ref='feed'>
		
		<ul v-if='contact'>
			<li v-for="message in messagees" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id"  >
				<div class="text">
					{{message.text}}
				</div>
			</li>
		</ul>



	</div>
</template>
<script >
	export default{
		props:{
			 contact:{ 
           	type:Object,
           
       },
       messagees:{
       	 type: Array,
       	required:true
		 }
		},
		 methods:{
		 	 scrollTOBottom(){
		 	 	 setTimeout(()=>{
		 	 	 	this.$refs.feed.scrollTop= this.$refs.feed.scrollHeight-this.$refs.feed.clientHeight;},50);
		 	 	 }
		 	 },
		 	 watch:{
		 	 	 contact(contact){

		 	 	 	this.scrollTOBottom();
		 	 	 },
		 	 	 messagees(messagees){
		 	 	 	this.scrollTOBottom();
		 	 	 }
		 	 }
		 
		

		

	}
</script>
<style type="text/css" scoped>
	.feed{height: 500px;
		max-height: 500px;
 overflow: auto;
background-color: lightgray;
	}
	ul{
		list-style-type: none;
		
 padding: 0px;
	}li.message{
		width: 100%;
		margin: 10px 0px;
		padding: 0px 5px;

	}
	li.message.recevied{
		text-align : left;
		
	}
	li.message.sent{
		text-align: right;
		
	}
	div.text{background-color: lightblue;
		    display: inline-block;
    max-width: 200px;
    border: 1px solid black;
    border-radius: 5px;
    padding: 2px 5px;
	}
</style>