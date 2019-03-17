var myObject = new Vue({
    el: '#app',
    data : {
        cards : 3,
        currentCard:1,
        summary : "",
        name : "",
        email : "",
        contact : "",
        postTitle : "",
        postContent : "",
        backBtnDisabled : true,
        errors: [],
        results : "",
    },
    methods : {
        forward: function(){
            if(this.currentCard  < this.cards){
                this.currentCard++;
            }
            if(this.currentCard == this.cards ){
                this.getFormData();
                console.log('get data');
            }
            this.buttonStatus();
        },
        backward: function(){
            if( this.currentCard <= 1 ){
            }else{
                this.currentCard--;
                this.errors = [];
            }
            this.buttonStatus();
        },
        start: function(){
            this.currentCard = 1;
        },
        checkform : function(){
            var status = true;
            if(this.currentCard == '1'){
                if(this.name == ""){
                    this.errors.push("Name can't be empty");
                    status = false;
                }
                if(this.email == ""){
                    this.errors.push("Email can't be empty");
                    status = false;
                }
            }
            if( this.currentCard == '2'){
                if(this.postTitle == ""){
                    this.errors.push("Post Title can't be empty");
                    status = false;
                }
            }
            if(status == true){
                this.errors = [];
            }
            return status;
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        buttonStatus : function(){
            if( this.currentCard == 1){
                this.backBtnDisabled = true;
            }else{
                this.backBtnDisabled = false;
            }
        },
        getFormData: function(){
            var obj = {
                'name' : this.name,
                'email' : this.email,
            };
            this.results = JSON.stringify(obj);
        }
    },
    computed: {
        // a computed getter
        show : function(){
            if(this.currentCard == 1){
                return 'cardone';
            }else if( this.currentCard == 2 ){
                return 'cardtwo';
            }else if( this.currentCard == 3){
                return 'cardthree';
            }
        },
    }
});