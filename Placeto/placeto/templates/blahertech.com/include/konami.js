if(document.images)
{kpic=new Image(1000,2000);kpic.src="http://www.blahertech.com/images/konami.png";}
var Konami=function(){var konami={addEvent:function(obj,type,fn,ref_obj)
{if(obj.addEventListener)
obj.addEventListener(type,fn,false);else if(obj.attachEvent)
{obj["e"+type+fn]=fn;obj[type+fn]=function(){obj["e"+type+fn](window.event,ref_obj);}
obj.attachEvent("on"+type,obj[type+fn]);}},input:"",pattern:"3838404037393739666513",load:function(link){this.addEvent(document,"keydown",function(e,ref_obj){if(ref_obj)konami=ref_obj;konami.input+=e?e.keyCode:event.keyCode;if(konami.input.indexOf(konami.pattern)!=-1){konami.code(link);konami.input="";return;}},this);this.iphone.load(link)},code:function(link){window.location=link},iphone:{start_x:0,start_y:0,stop_x:0,stop_y:0,tap:false,capture:false,keys:["UP","UP","DOWN","DOWN","LEFT","RIGHT","LEFT","RIGHT","TAP","TAP","TAP"],code:function(link){window.location=link},load:function(link){konami.addEvent(document,"touchmove",function(e){if(e.touches.length==1&&konami.iphone.capture==true){var touch=e.touches[0];konami.iphone.stop_x=touch.pageX;konami.iphone.stop_y=touch.pageY;konami.iphone.tap=false;konami.iphone.capture=false;konami.iphone.check_direction();}});konami.addEvent(document,"touchend",function(evt){if(konami.iphone.tap==true)konami.iphone.check_direction();},false);konami.addEvent(document,"touchstart",function(evt){konami.iphone.start_x=evt.changedTouches[0].pageX
konami.iphone.start_y=evt.changedTouches[0].pageY
konami.iphone.tap=true
konami.iphone.capture=true});},check_direction:function(){x_magnitude=Math.abs(this.start_x-this.stop_x)
y_magnitude=Math.abs(this.start_y-this.stop_y)
x=((this.start_x-this.stop_x)<0)?"RIGHT":"LEFT";y=((this.start_y-this.stop_y)<0)?"DOWN":"UP";result=(x_magnitude>y_magnitude)?x:y;result=(this.tap==true)?"TAP":result;if(result==this.keys[0])this.keys=this.keys.slice(1,this.keys.length)
if(this.keys.length==0)this.code(this.link)}}}
return konami;}
konami=new Konami();konami.code=function()
{if(document.getElementById&&document.createTextNode)
{if(document.getElementById('blahertech'))
{document.getElementById('blahertech').className='konami';}}}
konami.load();