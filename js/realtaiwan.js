var place_data=[
  {
   tag: "宜蘭芭樂",
   place: "臺北市",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "宜蘭芭樂",
   place: "新北市",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "台中霧峰鳳梨",
   place: "台中市",
   tel:"04-23303171",
   address:"台中市霧峰區中正里四德路10號"
  },

  {
   tag: "高雄旗山香蕉",
   place: "高雄市",
   tel:"0975-750-333",
   address:"高雄市旗山區中洲路147-2號"
  },

  {
   tag: "高雄旗山香蕉",
   place: "高雄市",
   tel:"0975-750-333",
   address:"高雄市旗山區中洲路147-2號"
  },

  {
   tag: "宜蘭芭樂",
   place: "基隆市",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "宜蘭芭樂",
   place: "桃園市",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "宜蘭芭樂",
   place: "新竹市",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "宜蘭芭樂",
   place: "新竹縣",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "台中霧峰鳳梨",
   place: "台中市",
   tel:"04-23303171",
   address:"台中市霧峰區中正里四德路10號"
  },

  {
   tag: "台中霧峰鳳梨",
   place: "台中市",
   tel:"04-23303171",
   address:"台中市霧峰區中正里四德路10號"
  },

  {
   tag: "台中霧峰鳳梨",
   place: "台中市",
   tel:"04-23303171",
   address:"台中市霧峰區中正里四德路10號"
  },

  {
   tag: "台中霧峰鳳梨",
   place: "雲林縣",
   tel:"04-23303171",
   address:"台中市霧峰區中正里四德路10號"
  },

  {
   tag: "高雄旗山香蕉",
   place: "高雄市",
   tel:"0975-750-333",
   address:"高雄市旗山區中洲路147-2號"
  },

  {
   tag: "高雄旗山香蕉",
   place: "高雄市",
   tel:"0975-750-333",
   address:"高雄市旗山區中洲路147-2號"
  },

  {
   tag: "高雄旗山香蕉",
   place: "高雄市",
   tel:"0975-750-333",
   address:"高雄市旗山區中洲路147-2號"
  },

  {
   tag: "宜蘭芭樂",
   place: "宜蘭縣",
   tel:"0938-900-765",
   address:"宜蘭三星鄉泰雅一路519號"
  },

  {
   tag: "阿強西瓜",
   place: "花蓮縣",
   tel:"0911-333-793",
   address:"花蓮市台九線282.5k　",
  },

  {
   tag: "阿強西瓜",
   place: "花蓮縣",
   tel:"0911-333-793",
   address:"花蓮市台九線282.5k"
  }
]
;

var vm = new Vue({
  el: "#app",
  data: {
    filter: "",
    place_data: place_data
  },computed:{
    now_area: function(){
      var vobj=this; 
      var result=this.place_data.filter(function(obj){
        return obj.tag==vobj.filter;
      });
      if (result.length==0){
        return null;
      }
      return result[0];
    }
  }
});

$("path").mouseenter(function(e){
  var tagname=$(this).attr("data-name");
  vm.filter=tagname;

});
