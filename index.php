<? include_once ('components/header.php')?>
    <!--Navbar-->
    <nav class="navbar navbar-dark green">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                <!--Navbar Brand-->
                <a class="navbar-brand" style="color: #ffffff">Learn English</a>
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->


   <div class="container center-on-small-only">
       <h1 style="margin-top: 15px;">Learn English</h1>
       <div class="alert alert-success" role="alert">Учебник для "level 2" можно сказать по ссылке - <a href="http://english.vdoma.info/files/Level_2.pdf" download onclick="ga('send','event', 'book', 'book_download');">English - the way American (формат pdf, размер -64 MB)</a></div>
       <div class="row">

           <div class="col-sm-4">
               <h2>Добавить папку</h2>
               <div id="add-folder" class="btn btn-info">add folder</div>
               <?if($dataFolders):?>
                   <h2>Папки</h2>
                   <?foreach($dataFolders as $folder):?>
                       <div>
                           <div class="folder-link btn btn-default" data-folder-status="hide" data-folder-id="<?=$folder['folder_id']?>"><?=$folder['folder_name']?></div>
                           <div class="folder-section-box-<?=$folder['folder_id']?> vdoma-display-none"></div>
                       </div>
                   <?endforeach?>
               <?endif?>
               <h2>Добавить раздел</h2>
               <div id="add-section" class="btn btn-secondary">add section</div>
               <h2>Разделы</h2>
               <?if($dataSections):?>
                    <?foreach($dataSections as $section):?>
                        <div><div class="section-link btn btn-warning" data-section-id="<?=$section['section_id']?>"><?=$section['section_name']?></div></div>
                    <?endforeach?>
                <?endif?>
           </div>
           <div class="col-sm-8">
                    <h2 class="section-show-name" style="text-align:center" data-section-id=""></h2>
                    <div id="add-phrase" class="hide btn btn-info" style="display:none">add phrase</div>
                   <div class="info-out-put" ></div>
                   
                   <div style="width: 50%; margin: 0 auto; text-align: center;" id="interview">
                       <div id="total-quetion"></div>
                       <div id="total-run"  data-run="0"></div>
                       <div id="answer-good" data-run-good="0"></div>
                       <div id="answer-bad" data-run-bad="0"></div>
                   </div>
                   
                    <ul class="answer"></ul>
                    
                   <div class="row">
                       <div class="english-test" style="margin-bottom:70px"></div>
                   </div>
                    <div class="help-info" >   
                        <h3>
                            Страничка Learn English предназначена для прохождения вопросов на знание английского языка.
                            Вопросы выводятся системой в случайном порядке. Большая часть материалов взяты с популярных курсов <a href="http://americanenglish.ua/" onclick="ga('send','event', 'link_site_american', 'site_american');" target="_blank" rel="nofollow" > American English Center </a>
                        </h3>

                        <strong>Последние добавленные фразы</strong>
                        <div class="d-flex justify-content-between">

                            <?$dataLastPhrases = getLastAddPhrases();?>
                            <?$sectionName = '';?>
                            <?foreach($dataLastPhrases as $rowLastPhrase):?>
                                <div>
                                    <?if ($rowLastPhrase['section_name']!=$sectionName):?>
                                        <h5 style="margin: 20px 0 0 0"><?=$rowLastPhrase['section_name']?></h5>
                                    <?endif?>
                                        <?=$rowLastPhrase['answer']?> -->
                                        <?=$rowLastPhrase['question']?><br />
                                </div>
                                <?$sectionName = $rowLastPhrase['section_name'];?>
                            <?endforeach?>

                        </div>

                        <div>
                            <strong>Как проходить вопросы?</strong>
                        </div>
                        <p>
                                Во-первых, нужно выбрать желаемый раздел из списка.
                            <div class="row">
                                <div class="col-sm-12">
                                    <img style="width: 215px;border: 2px solid #eee;" src="/img/section.png" alt="english section"/>
                                </div>
                            </div>
                                После того, как вы выберете раздел, появится список вопросов.
                            <div class="row">
                                <div class="col-sm-12">
                                    <img style="width: 100%;border: 2px solid #eee;" src="/img/question.png" alt="english question"/>
                                </div>
                            </div>
                                После того, как вы нажмете Ok, вы увидите, правильным был ответ или нет.
                            <div><strong>Правильный ответ</strong></div>
                            <div class="col-sm-12">
                                <img style="width: 100%;border: 2px solid #eee;" src="/img/success_answer.png" alt="success answer"/>
                            </div>
                                <div><strong>Неправильный ответ</strong></div>
                            <div class="col-sm-12">
                                <img style="width: 100%;border: 2px solid #eee;" src="/img/bad_answer.png" alt="bad answer"/>
                            </div>
                        </p>
                        <div>
                            <strong>Как добавлять свои вопросы-ответы?</strong>
                        </div>
                        <p>
                            Сначала нужно выбрать раздел из списка.
                            <div class="row">
                                <div class="col-sm-12">
                                    <img style="width: 215px;border: 2px solid #eee;" src="/img/section.png" alt="english section"/>
                                </div>
                            </div>
                            Нажать кнопку <strong>Add Phrase</strong>.
                            <div class="row">
                                <div class="col-sm-12">
                                    <img style="width: 100%;border: 2px solid #eee;" src="/img/add_phrases.png" alt="english add phrases"/>
                                </div>
                            </div>
                            <p>В поля нужно вписать вопрос и ответ, желательно использовать только строчные буквы. В последнем поле нужно решить пример, чтобы мы могли убедиться, что вы не бот :)</p>
                            <p>После того, как вы выполните все эти шаги, новый вопрос попадет на модерацию к администрации сайта.</p>
                            <p>Примечание: отвечая на вопросы (и создавая новые), не используйте, пожалуйста, сокращения вроде <i>didn’t, doesn’t, he’s</i>, и т. д., потому что система пока что воспринимает их как ошибку. Поэтому, во избежание недоразумений, используйте полную форму слов - <i>did not, does not, he is,</i> и т. д. Спасибо за понимание :)</p>

                        </p>
                        <p>
                            Если слова, которые вы хотите предложить, не соответствуют ни одному разделу из предложенных, пожалуйста, добавьте для них новый раздел.
                            <div><strong>Как добавить новый раздел?</strong></div>
                            Кнопка Add Section в самом верху над списком уже существующих разделов.
                            <div class="row">
                                <div class="col-sm-12">
                                    <img style="width: 315px;border: 2px solid #eee;" src="/img/add_section.png" alt="english add section"/>
                                </div>
                            </div>
                            В указанные поля нужно вписать название раздела и пройти проверку на спам. После этого новый раздел появится в списке.

                        </p>
                        <div>
                            <strong>Советы</strong>
                        </div>
                        <p>
                            <div> Ваши советы и предложения по улучшению сервиса, отправляйте, пожалуйста на <a href="mailto:vdoma.info@gmail.com">vdoma.info@gmail.com</a></div>
                        </p>
                    </div>
                </div>
               
           </div>
       </div>

	   <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,linkedin,viber,twitter,whatsapp,skype,telegram,lj,blogger,moimir" data-counter="" data-lang="en"></div>

        <script>
           $(document).ready(function(){
            $("#add-phrase").on('click', function(){
                let box =$('.english-test');
                let dataAntiSpan = testAntiSpam();
                let sectionShowName =$('.section-show-name');
                let checkSectionId = sectionShowName.attr('data-section-id');
                if(!checkSectionId){
                    return false;
                }
                $('#interview').hide();
                box.empty();
                box.append('<input id="add-question" placeholder="Вопрос на русском" type="text">');
                box.append('<input id="add-answer" placeholder="Ответ на english" type="text">');
                box.append('<input id="anti-spam" data-anti-spam="'+dataAntiSpan.sum+'" placeholder="анти-спам. Сколько будет '+dataAntiSpan.numOne+' + '+dataAntiSpan.numTwo+'=?" type="text">');
                box.append('<div id="save-add-phrase" onclick="savePhrase()" class="save btn btn-default">save</div>');
            });

            $( "body" ).on('click','.section-link',function() {
                var data = {};
                data.section_id = $(this).attr('data-section-id');
                data.section_name = $(this).text();
                $('.hide').show();
                $('.help-info').hide();
                outPutList(data);
            });

            $('#add-section').on('click', function(){
                let data = {};
                data.textTitle = 'Add section';
                data.saveName = 'section';
                outPutForm(data);
            });

           $('#add-folder').on('click', function(){
               let data = {};
               data.textTitle = 'Add folder';
               data.saveName = 'folder';
               outPutForm(data);
           });

               $('.navbar-brand').on('click', function(){
                   $('.english-test').empty();
                   $('.help-info').show();
               });

               $('.folder-link').on('click', function(){
                   let obj = $(this);
                   let dataObj = {};
                   dataObj.folder_id =obj.attr('data-folder-id');
                   let boxObj = $('.folder-section-box-'+dataObj.folder_id);
                   let folderStatus =obj.attr('data-folder-status');
                   if(folderStatus=='hide'){
                       $.ajax({
                           type: "POST",
                           dataType: 'json',
                           url:"/ajax.php",
                           timeout:4000,
                           data: dataObj,
                           success: function(data){
                               let html = '';
                               if(data.length>0){
                                   for(key in data){
                                       html+='<div class="section-link btn btn-warning vdoma-display-block" data-folder-section-id="'+data[key].folder_id+'" data-section-id="'+data[key].section_id+'">';
                                       html+=data[key].section_name;
                                       html+='</div>';
                                   }
                                   obj.attr('data-folder-status', 'show');

                               }else{
                                   html+='<div class="section-link btn btn-warning" data-folder-section-id="'+data[key].folder_id+'" data-section-id="'+data[key].section_id+'">';
                                   html+='Для этой папки еще нет разделов';
                                   html+='</div>';
                               }
                               boxObj.append(html);
                               boxObj.show('blind');
                           }

                       });

                   }else{
                       if(boxObj.is(':hidden')){
                           boxObj.show('blind');
                       }else{
                           boxObj.hide('blind');
                       }

                   }
               });
            
          
           });

           function outPutForm(data){
               let box =$('.english-test');
               $('.section-show-name').text(data.textTitle);
               $('.hide').hide();
               let dataAntiSpan = testAntiSpam();
               box.empty();
               let htmlAddSection = '<input id="form-input" placeholder="'+data.textTitle+'" type="text">';
               htmlAddSection += '<input id="anti-spam" data-anti-spam="'+dataAntiSpan.sum+'" placeholder="анти-спам. Сколько будет '+dataAntiSpan.numOne+' + '+dataAntiSpan.numTwo+'=?" type="text">';
               htmlAddSection += '<div id="form-save" onclick="saveForm(\''+data.saveName+'\')" class="save btn btn-default">save</div>';
               box.append(htmlAddSection);
           }

           function saveForm(name){
               //проверка на анти-спам
               let inputAntiSpamObj = $('#anti-spam');

               let formInput = $('#form-input').val();
               formInput = formInput.trim();

               let inputNum = inputAntiSpamObj.val();
               let checkNum = inputAntiSpamObj.attr('data-anti-spam');
               if(!formInput){
                   alert('Поле "'+name+'" не может быть пустым');
                   return false;
               }
               if(inputNum != checkNum){
                   alert("Не прошли проверку анти-спам");
                   return false;
               }

               $.ajax({
                   type: "POST",
                   url:"/ajax.php",
                   timeout:4000,
                   data: {
                       form_name: name,
                       form_input: formInput

                   },
                   success: function(data){
                       if(data>0){
                           alert('Успешно все добавлено');
                           window.location.reload(true);
                       }else{
                           alert('Упс, что-то пошло не так');
                       }
                   }

               });
           }
           
             function outPutList(data){
                let sectionShowName =$('.section-show-name');
                sectionShowName.text(data.section_name);
                sectionShowName.attr('data-section-id', data.section_id);
                $.ajax({
                    type: "POST",
                    url:"/ajax.php",
                    timeout:4000,
                    data: {
                        getlist: 'getlist',
                        section_id:data.section_id
                    },
                    success: function(data){
                        let englishTest =$('.english-test');
                        //сбрасываем пройденые результаты
                        resetTotalTest();
                        if(data!=0){
                            data = JSON.parse(data);

                            let dataLength = data.length;

                            $('#interview').show();
                            $('#total-quetion').text('Всего вопросов: '+dataLength).css('color', 'blue');

                            let totalRunBegin = 0;
                            let totalRunObj = $('#total-run');
                            totalRunObj.text('Пройденных: '+totalRunBegin).css('color', 'black');


                            englishTest.empty();


                            let htmlList = '';
                            for(let i=0; i<dataLength; i++){
                                englishTest.append('<span>'+(i+1)+'/'+dataLength+'. </span><span id="question'+i+'">'+data[i].question+'</span><br>');
                                englishTest.append('<input id="answer-text'+i+'" data-answer-model="'+data[i].answer.toLowerCase()+'"  style="width: 74%; margin: 0 auto" type="text"/><button type="button"  onclick="check('+i+')" class="ok'+i+' btn btn-default">Ok</button><br>');
                            }
                        }else{
                            $('#interview').hide();
                            //$('.section-show-name').text('');
                            alert('В этой категории еще нет фраз');
                        }
                    }

                });
            }

            function savePhrase(){
                //проверка на анти-спам
                let inputAntiSpamObj = $('#anti-spam');
                
                let question = $('#add-question').val();
                question = question.trim();
                
                let answer = $('#add-answer').val();
                answer = answer.trim();
                
                let inputNum = inputAntiSpamObj.val();
                let checkNum = inputAntiSpamObj.attr('data-anti-spam');
                if(!question){
                    alert('Поле "Вопрос" не может быть пустым');
                    return false;
                }
                if(!answer){
                    alert('Поле "Ответ" не может быть пустым');
                    return false;
                }
                if(inputNum != checkNum){
                    alert("Не прошли проверку анти-спам");
                    return false;
                }

                let section_id = $('.section-show-name').attr('data-section-id');

                $.ajax({
                    type: "POST",
                    url:"/ajax.php",
                    timeout:4000,
                    data: {
                        question: question,
                        answer:answer,
                        section_id:section_id,
                        visible:0
                    },
                    success: function(data){
                        if(data>0){
                            $('.info-out-put').fadeIn('1000').css('color','green').text('Фраза добавлена').fadeOut('10000');
                            let dataList={};
                            dataList.section_id = section_id;
                            dataList.section_name = $('.section-show-name').text();
                            outPutList(dataList);
                        }else{
                            alert('Упс, что-то пошло не так');
                        }
                    }

                });

            }

//            function saveSection(){
//                //проверка на анти-спам
//                let inputAntiSpamObj = $('#anti-spam');
//
//                let section = $('#add-section-name').val();
//                section = section.trim();
//
//                let inputNum = inputAntiSpamObj.val();
//                let checkNum = inputAntiSpamObj.attr('data-anti-spam');
//                if(!section){
//                    alert('Поле "Название раздела" не может быть пустым');
//                    return false;
//                }
//                if(inputNum != checkNum){
//                    alert("Не прошли проверку анти-спам");
//                    return false;
//                }
//
//                $.ajax({
//                    type: "POST",
//                    url:"/ajax.php",
//                    timeout:4000,
//                    data: {
//                        section_name: section
//                    },
//                    success: function(data){
//                        if(data>0){
//                            alert('Добавлен новый раздел');
//                            window.location.reload(true);
//                        }else{
//                            alert('Упс, что-то пошло не так');
//                        }
//                    }
//
//                });
//
//            }



            // для анти-спам возвращает числа от 1-9 и их сумму
            function testAntiSpam(){
                var data = {};
                data.numOne = randomInteger();
                data.numTwo = randomInteger();
                data.sum = data.numOne+data.numTwo;
                return data;
            }

            //возвращает random число от 1 до 9
            function randomInteger(){
                let minNum = 1;
                let maxNum = 9;
                let rand = minNum + Math.random()*(maxNum - minNum);
                rand = Math.round(rand);
                return rand;
            }

            function check(data){
                let spanQuestion =$('#question'+data);
                let inputAnswer =$('#answer-text'+data);


                let question = spanQuestion.text();
                let answer = inputAnswer.val();
                answer = answer.trim();
                
                let answerModel = inputAnswer.attr('data-answer-model');
                answerModel = answerModel.trim();

                var data = {};

                let valution = '#FE9B9A ';
                if(answer){
                    data.checkQuetionAnswer =formatAnswer(answerModel) === formatAnswer(answer);
                }


                 if(data.checkQuetionAnswer) {
                     valution = '#CCFE9A';
                 }

                setTotalTest(data);


                inputAnswer.css('background', valution);
                $('<span> -> '+answerModel+'</span>').appendTo(spanQuestion);
                inputAnswer.prop('disabled', true);
                inputAnswer.removeAttr("id");

            }




            // установка результатов прогресса
            function setTotalTest(data){
                let totalRunObj = $('#total-run');
                let answerGoodObj =$('#answer-good');
                let answerBadOnj =$('#answer-bad');
                let outPut;

                let numRunCurrent = Number(totalRunObj.attr('data-run'));
                numRunCurrent++;
                totalRunObj.text('Пройденных: '+ numRunCurrent);
                totalRunObj.attr('data-run', numRunCurrent);

                if(data.checkQuetionAnswer){
                    data.count = Number(answerGoodObj.attr('data-run-good'));
                    outPut = answerGoodObj;
                    data.typeText = "Успешных: ";
                    data.colorOutPut = 'green';
                    data.attrOutPut = 'data-run-good';

                }else{
                    outPut = answerBadOnj;
                    data.count = Number(answerBadOnj.attr('data-run-bad'));
                    data.typeText = "Ошибочных: ";
                    data.colorOutPut = 'red';
                    data.attrOutPut = 'data-run-bad';
                }

                data.count++;
                outPut.text(data.typeText+data.count).css('color', data.colorOutPut);
                outPut.attr(data.attrOutPut, data.count);

            }
            
            function resetTotalTest(){
                $('#total-run').attr('data-run','0').text('');
                $('#answer-good').attr('data-run-good','0').text('');
                $('#answer-bad').attr('data-run-bad','0').text('');
            }




            // изменение формата do not on don't
            function formatAnswer(answerUser){

                //создаем массив правил для замен
                var replaceRules = {
                    'don\'t': 'do not',
                    'doesn\'t': 'does not',
                    'didn\'t': 'did not'
                };

                //приводим ответ к нижнему регистру
                answerUser = answerUser.toLowerCase();

                //пробегаемся по массиву правил и если есть правило, заменяем его
                for(let wordKey in replaceRules){
                    //используем объект RegExp
                    var wordSearch = new RegExp(wordKey, 'g');

                    //находим по ключу слово и меняем это слово на значение
                    answerUser = answerUser.replace(wordSearch, replaceRules[wordKey]);
                }

                return answerUser;
            }


        </script>
		  <script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>

  
  
		
		
		
		
<? include_once ('components/footer.php')?>