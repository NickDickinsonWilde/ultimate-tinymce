(function(){/*tinymce.PluginManager.requireLangPack('loremipsum');*/tinymce.create('tinymce.plugins.LoremIpsum',{init:function(ed,url){ed.addCommand('mceLoremIpsum',function(){ed.windowManager.open({file:url+'/loremipsum.html',width:320+ed.getLang('loremipsum.delta_width',0),height:140+ed.getLang('loremipsum.delta_height',0),inline:1},{plugin_url:url})});ed.addButton('loremipsum',{title:ed.getLang('loremipsum.desc'),cmd:'mceLoremIpsum',image:url+'/img/loremipsum.gif'})},createControl:function(n,cm){return null},getInfo:function(){return{longname:'Lorem Ipsum plugin',author:'Jakub Scholz (based on similar plugin from Guszt�v P�lv�lgyi)',authorurl:'http://www.assembla.com/spaces/lorem-ipsum',infourl:'http://www.assembla.com/spaces/lorem-ipsum',version:"0.1.2"}}});tinymce.PluginManager.add('loremipsum',tinymce.plugins.LoremIpsum)})();