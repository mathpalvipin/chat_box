<template>

<div class="contactlist" v-if="contacts"> 
	
<ul>
	<li v-for='contact in sortContact' :key='contact.id' @click='selectcontact(contact)' :class="{ 'selected ':contact==selected}">
		 
		
			<h5  class="name">{{contact.name}}<small v-show="contact.unread" >{{contact.unread}}</small></h5>
			<p class="email">{{contact.email}}</p>
 

	</li>
</ul>

</div>
</template>
<script >
	export default  {
		props:{
			contacts:{
				type:Array,
				default:[]
			}
		} ,
		data(){
			return {
				selected:this.contacts.length? this.contacts[0]:null
			} ;
		},
		methods:{
			selectcontact(contact){
				this.selected=contact;
				this.$emit('selected',contact);
			}
		} ,
		computed:{
			sortContact(){
				return _.sortBy(this.contacts,[(contact)=>{
					if(contact==this.selected)
						  {return 1000000000000;}
									return contact.unread;
				}]).reverse();
			}
		}
	}
</script>
<style type="text/css" scoped>
	
	.contactlist{
		max-height: 600px;
		overflow: auto;
		border-left: 1px solid black;

	}
	ul{padding-left: 0px;
		list-style-type: none;
	}
	li{
		border-bottom: 1px solid black  ;
		padding: 20px;
		max-height: 80px;
		overflow: hidden;
		position: relative;
		cursor: pointer;
	}
	li.selected{
		background-color: lightblue;
	}
	small{
		margin: 2px 10px;
		border: 1px solid black;
background-color: green;
border-radius: 5px;
padding: 1px;
color: white;
	}
</style>