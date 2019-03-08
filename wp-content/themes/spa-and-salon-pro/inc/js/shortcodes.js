(function() {
   tinymce.PluginManager.add('spa_and_salon_mce_button', function( editor, url ) {
      editor.addButton( 'spa_and_salon_mce_button', {
         text: 'Short Codes',
         icon: false,
         type: 'menubutton',
         menu: [
            {
               text: 'Layouts',
               menu: [
                  {
                     text: 'Grid Layouts',
                     onclick: function() {
                        editor.windowManager.open( {
                           title: 'Insert no columns to show in a row',
                           id:'column-selector',
                           body: [
                              {
                                 type: 'listbox',
                                 name: 'columns',
                                 label: 'No of Columns',
                                 id :'no-of-columns',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'first_column',
                                 label: 'First Column Width',
                                 id:'first_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'second_column',
                                 label: 'Second Column Width',
                                 id:'second_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'third_column',
                                 label: 'Third Column Width',
                                 id:'third_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'fourth_column',
                                 label: 'Fourth Column Width',
                                 id:'fourth_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'fifth_column',
                                 label: 'Fifth Column Width',
                                 id:'fifth_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },
                              {
                                 type: 'listbox',
                                 name: 'sixth_column',
                                 label: 'Sixth Column Width',
                                 id:'sixth_column',
                                 'values': [
                                    {text: '1', value: '1'},
                                    {text: '2', value: '2'},
                                    {text: '3', value: '3'},
                                    {text: '4', value: '4'},
                                    {text: '5', value: '5'},
                                    {text: '6', value: '6'},
                                 ]
                              },

                           ],
                           onsubmit: function( e ) {
                              
                                 if(e.data.columns == 1){
                                    if( parseInt(e.data.first_column) == 6 ){
                                        editor.insertContent( 
                                           '[rara_column_wrap]<br />'+ 
                                           '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                           '[/rara_column_wrap]<br />'
                                        );
                                    }else{
                                        alert('Invalid! first column width should be 6');
                                    }
                                 }else if(e.data.columns == 2){
                                    if((parseInt(e.data.first_column) + parseInt(e.data.second_column)) == 6 ){
                                        editor.insertContent( 
                                            '[rara_column_wrap]<br />'+ 
                                            '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.second_column+'"]Put your column 2 text[/rara_column]<br />'+
                                            '[/rara_column_wrap]<br />'
                                        );
                                    }else{
                                        alert('Invalid! Sum of first and second columns should be 6');
                                    }
                                 }else if(e.data.columns == 3){
                                    if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column)) == 6 ){
                                        editor.insertContent( 
                                            '[rara_column_wrap]<br />'+ 
                                            '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.second_column+'"]Put your column 2 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.third_column+'"]Put your column 3 text[/rara_column]<br />'+
                                            '[/rara_column_wrap]<br />'
                                        );
                                    }else{
                                        alert('Invalid! Sum of first, second and third columns should be 6');
                                    }
                                 }else if(e.data.columns == 4){
                                    if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column)) == 6 ){
                                         editor.insertContent( 
                                            '[rara_column_wrap]<br />'+ 
                                            '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.second_column+'"]Put your column 2 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.third_column+'"]Put your column 3 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.fourth_column+'"]Put your column 4 text[/rara_column]<br />'+
                                            '[/rara_column_wrap]<br />'
                                        );
                                     }else{
                                        alert('Invalid! Sum of first, second, third and fourth columns should be 6');
                                     }
                                 }else if(e.data.columns == 5){
                                    if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column) + parseInt(e.data.fifth_column)) == 6 ){
                                        editor.insertContent( 
                                            '[rara_column_wrap]<br />'+ 
                                            '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.second_column+'"]Put your column 2 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.third_column+'"]Put your column 3 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.fourth_column+'"]Put your column 4 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.fifth_column+'"]Put your column 5 text[/rara_column]<br />'+
                                            '[/rara_column_wrap]<br />'
                                        );
                                    }else{
                                        alert('Invalid! Sum of first, second, third, fourth and fifth columns should be 6');
                                    }
                                 }else if(e.data.columns == 6){
                                    if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column) + parseInt(e.data.fifth_column) + parseInt(e.data.sixth_column)) == 6 ){
                                        editor.insertContent( 
                                            '[rara_column_wrap]<br />'+ 
                                            '[rara_column span="'+e.data.first_column+'"]Put your column 1 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.second_column+'"]Put your column 2 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.third_column+'"]Put your column 3 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.fourth_column+'"]Put your column 4 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.fifth_column+'"]Put your column 5 text[/rara_column]<br />'+
                                            '[rara_column span="'+e.data.sixth_column+'"]Put your column 6 text[/rara_column]<br />'+
                                            '[/rara_column_wrap]<br />'
                                        );
                                    }else{
                                        alert('Invalid! Sum of all columns should be 6');
                                    }
                                }
                            }
                        });
                     }
                  },
                  {
                     text: 'Divider',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Divider',
                     body: [
                           {
                              type: 'textbox',
                              name: 'border_color',
                              label: 'Border Color',
                              value: '#CCCCCC'
                           },
                           {
                              type: 'listbox',
                              name: 'border_style',
                              label: 'Border Style',
                              'values': [
                                 {text: 'Solid', value: 'solid'},
                                 {text: 'Dashed', value: 'dashed'},
                                 {text: 'Dotted', value: 'dotted'},
                                 {text: 'Double', value: 'double'}
                              ]
                           },
                           {
                              type: 'textbox',
                              name: 'thickness',
                              label: 'Border Thickness',
                              value: '1px'
                           },
                           {
                              type: 'textbox',
                              name: 'border_width',
                              label: 'Border Width',
                              value: '100%'
                           },
                           {
                              type: 'textbox',
                              name: 'mar_top',
                              label: 'Top Spacing',
                              value: '20px'
                           },
                           {
                              type: 'textbox',
                              name: 'mar_bot',
                              label: 'Bottom Spacing',
                              value: '20px'
                           },
                      
                        ],
                        onsubmit: function( e ) {
                           editor.insertContent('[rara_divider color="'+e.data.border_color+'" style="'+e.data.border_style+'" thickness="'+e.data.thickness+'" width="'+e.data.border_width+'" mar_top="'+e.data.mar_top+'" mar_bot="'+e.data.mar_bot+'"]');
                        }
                       });
                     }
                  },
                  {
                     text: 'Spacing',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Spacing',
                     body: [
                           {
                              type: 'textbox',
                              name: 'spacing_height',
                              label: 'Spacing Height',
                              value: '10px'
                           }
                        ],
                        onsubmit: function( e ) {
                           editor.insertContent('[rara_spacing spacing_height="'+e.data.spacing_height+'"]');
                        }
                       });
                     }
                  }
               ]
            },
            {
               text: 'Elements',
               menu: [
                  {
                     text: 'Social Icons',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Social Icons',
                     body: [
                           {
                              type: 'textbox',
                              name: 'facebook',
                              label: 'Facebook Url',
                              value: 'http://facebook.com/',
                              minWidth: 300,
                           },
                           {
                              type: 'textbox',
                              name: 'twitter',
                              label: 'Twitter Url',
                              value: 'http://twitter.com/'
                           },
                           {
                              type: 'textbox',
                              name: 'instagram',
                              label: 'Instagram Url',
                              value: 'https://www.instagram.com/'
                           },
                           {
                              type: 'textbox',
                              name: 'gplus',
                              label: 'Google Plus Url',
                              value: 'https://plus.google.com/'
                           },
                           {
                              type: 'textbox',
                              name: 'pinterest',
                              label: 'Pinterest Url',
                              value: 'https://www.pinterest.com/'
                           },
                           {
                              type: 'textbox',
                              name: 'linkedin',
                              label: 'Linkedin Url',
                              value: 'http://www.linkedin.com'
                           },
                           {
                              type: 'textbox',
                              name: 'youtube',
                              label: 'Youtube Url',
                              value: 'http://www.youtube.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'vimeo',
                              label: 'Vimeo Url',
                              value: 'https://vimeo.com/'
                           },
                           {
                              type: 'textbox',
                              name: 'dribbble',
                              label: 'Dribbble Url',
                              value: 'https://dribbble.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'foursquare',
                              label: 'Foursquare Url',
                              value: 'https://foursquare.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'flickr',
                              label: 'Flickr Url',
                              value: 'https://flickr.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'reddit',
                              label: 'Reddit Url',
                              value: 'https://reddit.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'skype',
                              label: 'Skype ID',
                              value: 'skype:raratheme'
                           }, 
                           {
                              type: 'textbox',
                              name: 'stumbleupon',
                              label: 'StumbleUpon Url',
                              value: 'https://stumbleupon.com/'
                           }, 
                           {
                              type: 'textbox',
                              name: 'tumblr',
                              label: 'Tumblr Url',
                              value: 'https://tumblr.com/'
                           }, 
                        ],
                        onsubmit: function( e ) {
                             editor.insertContent('[rara_social facebook="'+e.data.facebook+'" twitter="'+e.data.twitter+'" instagram="'+e.data.instagram+'" gplus="'+e.data.gplus+'" pinterest="'+e.data.pinterest+'" linkedin="'+e.data.linkedin+'" youtube="'+e.data.youtube+'" vimeo="'+e.data.vimeo+'" dribbble="'+e.data.dribbble+'" foursquare="'+e.data.foursquare+'" flickr="'+e.data.flickr+'" reddit="'+e.data.reddit+'" skype="'+e.data.skype+'" stumbleupon="'+e.data.stumbleupon+'" tumblr="'+e.data.tumblr+'"]'); 
                        }
                       });
                     }
                  },                  
                  {
                     text: 'Call to Action',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Call To Action',
                     body: [
                           {
                              type: 'textbox',
                              name: 'call_to_action_title',
                              label: 'Call to Action Title',
                              value: 'Call to Action Title',
                              minWidth: 500,
                           },
                           {
                              type: 'textbox',
                              name: 'call_to_action',
                              label: 'Call to Action Text',
                              value: 'Call to action text',
                              multiline: true,
                              minWidth: 500,
                              minHeight: 150
                           },
                           {
                              type: 'textbox',
                              name: 'call_to_action_btn',
                              label: 'Button Text',
                              value: 'Read More',
                              minWidth: 500,
                           },
                           {
                              type: 'textbox',
                              name: 'call_to_action_btn_url',
                              label: 'Button Url',
                              value: '#',
                              minWidth: 500,
                           },
                           {
                              type: 'listbox',
                              name: 'open_link',
                              label: 'Open Link',
                              'values': [
                                 {text: 'In Same Tab', value: '_self'},
                                 {text: 'In Different Tab', value: '_blank'}
                              ]
                           },
                           {
                              type: 'listbox',
                              name: 'btn_align',
                              label: 'Button Align',
                              'values': [
                                 {text: 'Center', value: 'center'},
                                 {text: 'Right', value: 'right'},
                                 {text: 'Left', value: 'left'}
                              ]
                           },
                        ],
                        onsubmit: function( e ) {
                             editor.insertContent('[rara_call_to_action title="'+e.data.call_to_action_title+'" button_text="'+e.data.call_to_action_btn+'" button_url="'+e.data.call_to_action_btn_url+'" target="'+e.data.open_link+'" button_align="'+e.data.btn_align+'"]'+e.data.call_to_action+'[/rara_call_to_action]'); 
                        }
                       });
                     }
                  },
                  {
                     text: 'Slider',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Slider',
                     body: [
                           {
                              type: 'textbox',
                              name: 'no_of_img',
                              label: 'No of Image',
                              value: '4',
                              minWidth: 500,
                           },
                           {
                              type: 'listbox',
                              name: 'show_caption',
                              label: 'Show Caption',
                              'values': [
                                 {text: 'Yes', value: 'yes'},
                                 {text: 'No', value: 'no'}
                              ]
                           },
                           {
                              type: 'listbox',
                              name: 'link_image',
                              label: 'Link Image to Url',
                              'values': [
                                 {text: 'Yes', value: 'yes'},
                                 {text: 'No', value: 'no'}
                              ]
                           },
                           {
                              type: 'listbox',
                              name: 'open_link',
                              label: 'Open Link',
                              'values': [
                                 {text: 'In Same Tab', value: 'self'},
                                 {text: 'In Different Tab', value: 'blank'}
                              ]
                           },
                        ],
                        onsubmit: function( e ) {
                           var caption, link_image, open_link, j;
                           
                           editor.insertContent('[rara_slider]');
                           for(i=1; i <= e.data.no_of_img; i++){
                              caption = e.data.show_caption=="yes" ? 'caption="Caption text'+i+'"' : '';
                              link_image = e.data.link_image=="yes" ? 'link="http://linkto'+i+'"' : '';
                              open_link = e.data.open_link=="self" ? 'target="_self"' : 'target="_blank"';

                              editor.insertContent(
                              '<br />[rara_slide '+caption+' '+link_image+' '+open_link+']http://your_image_url'+i+'[/rara_slide]'
                              ); 
                             }
                           editor.insertContent('<br />[/rara_slider]');
                        }
                       });
                     }
                  },
                  {
                     text: 'Toggle',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Toggle',
                     body: [
                           {
                              type: 'textbox',
                              name: 'toggle_heading',
                              label: 'Heading',
                              value: 'Your Heading',
                              minWidth: 400,
                           },
                           {
                              type: 'textbox',
                              name: 'toggle_detail',
                              label: 'Detail',
                              value: 'Write Detail Here',
                              multiline: true,
                              minWidth: 400,
                              minHeight: 150
                           },
                           {
                              type: 'listbox',
                              name: 'open_close',
                              label: 'Open/Close',
                              'values': [
                                 {text: 'Close', value: 'close'},
                                 {text: 'Open', value: 'open'}
                              ]
                           },
                        ],
                        onsubmit: function( e ) {
                             editor.insertContent('[rara_toggle title="'+e.data.toggle_heading+'" status="'+e.data.open_close+'"]'+e.data.toggle_detail+'[/rara_toggle]'); 
                        }
                       });
                     }
                  },
                  {
                     text: 'Tab',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Tab',
                     body: [
                           {
                              type: 'textbox',
                              name: 'no_of_tab',
                              label: 'No of Tabs',
                              value: '4',
                              minWidth: 300,
                           },
                           {
                              type: 'listbox',
                              name: 'tab_type',
                              label: 'Show Caption',
                              'values': [
                                 {text: 'Horizontal', value: 'horizontal'},
                                 {text: 'Vertical', value: 'vertical'}
                              ]
                           },
                        ],
                        onsubmit: function( e ) {
                           var j;
                           
                           editor.insertContent('[rara_tab_group type="'+e.data.tab_type+'"]');
                           for(j=1; j <= e.data.no_of_tab; j++){
                              editor.insertContent(
                              '<br />[rara_tab title="Title '+j+'"]Content '+j+'[/rara_tab]'
                              ); 
                             }
                           editor.insertContent('<br />[/rara_tab_group]');
                        }
                       });
                     }
                  },
                  {
                     text: 'List Style',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'List style',
                     body: [
                           {
                              type: 'textbox',
                              name: 'no_of_list',
                              label: 'No of List Items',
                              value: '4',
                              minWidth: 300,
                           },
                           {
                              type: 'listbox',
                              name: 'list_type',
                              label: 'List Icon',
                              'values': [
                                 {text: 'Check Circle Icon', value: 'rara-list-style1'},
                                 {text: 'Square Icon', value: 'rara-list-style2'},
                                 {text: 'Arrow Circle Icon', value: 'rara-list-style3'},
                                 {text: 'Chevron Icon', value: 'rara-list-style4'},
                                 {text: 'Plus Circle Icon', value: 'rara-list-style5'},
                                 {text: 'Star Icon', value: 'rara-list-style6'},
                                 {text: 'Hand Right Icon', value: 'rara-list-style7'},
                                 {text: 'Gear Icon', value: 'rara-list-style8'},
                                 {text: 'Life Ring Icon', value: 'rara-list-style9'},
                                 {text: 'Paper Plane Icon', value: 'rara-list-style10'},
                              ]
                           },
                        ],
                        onsubmit: function( e ) {
                           var k;
                           
                           editor.insertContent('[rara_list list_type="'+e.data.list_type+'"]');
                           for(k=1; k <= e.data.no_of_list; k++){
                              editor.insertContent(
                              '<br />[rara_li]List Item '+k+'[/rara_li]'
                              ); 
                             }
                           editor.insertContent('<br />[/rara_list]');
                        }
                       });
                     }
                  },
                  {
                     text: 'Accordian',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Accordian',
                     body: [
                           {
                              type: 'textbox',
                              name: 'no_of_acc',
                              label: 'No of Accordian',
                              value: '4',
                              minWidth: 300,
                           },                           
                        ],
                        onsubmit: function( e ) {
                           var j;
                           
                           editor.insertContent('[rara_accordian_wrap]');
                           for(j=1; j <= e.data.no_of_acc; j++){
                              editor.insertContent(
                              '<br />[rara_accordian title="Title '+j+'"]Content '+j+'[/rara_accordian]'
                              ); 
                             }
                           editor.insertContent('<br />[/rara_accordian_wrap]');
                        }
                       });
                     }
                  },
                  {
                     text: 'Drop Cap',
                     onclick: function() {
                     editor.windowManager.open( {
                     title: 'Drop Cap',
                     body: [
                           {
                              type: 'listbox',
                              name: 'dropcap_font',
                              label: 'Font Size',
                              'values': [
                                    {text: '2', value: 'rara-drop-cap2'},
                                    {text: '3', value: 'rara-drop-cap3'},
                                    {text: '4', value: 'rara-drop-cap4'},
                                 ]
                           },
                           {
                              type: 'textbox',
                              name: 'dropcap_letter',
                              label: 'Letter',
                              value: 'Drop Cap Letter',
                              minWidth: 400,
                           },                       
                        ],
                        onsubmit: function( e ) {
                             editor.insertContent('[rara_drop_cap font_size="'+e.data.dropcap_font+'"]'+e.data.dropcap_letter+'[/rara_drop_cap]'); 
                        }
                       });
                     }
                  },
               ]
            }
         ]
      });
   });
})();