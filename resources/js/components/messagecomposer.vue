<template>
	<div class="composer">
		
<textarea v-model="message"   placeholder="message ..." ></textarea>
<button  @click="send" class="send btn-primary"> send</button>

	</div>


</template>
<script >
	 export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send() {

                
                if (this.message == '') {
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>
<style type="text/css" scoped>
	 textarea{
     width: 96%;
     margin: 10px;
      resize: none;
      border: 1px solid lightgray;
      border-radius: 3px;
      padding: 6px;
      flex: 5;

	 }
	 .composer{
	 	display: flex;
	 }
	 .send{
          border-radius: 3px; 
	 	margin: 10px 3px;

	 	flex: 1
	 }
</style>