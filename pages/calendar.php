
<div class="row full-bloc">
    <div class="col-md-9 col-md-push-3 container-calendar">
        <div id="calendar"></div>
    </div>
    <div class="col-md-3 col-md-pull-9 container-event-type">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="close" title="Ajouter aux favoris" id="submitformfav"><i class="fa fa-star"></i></button>
                <span id="nivTitle">Calendrier</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="grp">Groupes</label>
                    <select class="select-app form-control" id="grouplist" data-live-search="true" title="Choisissez..." multiple>
                    </select>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-sm-6">
                        <button type="button" id="submitformrel" data-toggle="tooltip" data-placement="bottom" title="Recharger le calendrier" class="btn btn-primary col-xs-12"><i class="fa fa-refresh fa-fw"></i> Recharger
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" id="submitformgen" data-toggle="tooltip" data-placement="bottom" title="Exporter votre calendrier" class="btn btn-default col-xs-12"><i class="fa fa-calendar-o"></i> Exporter
                        </button>
                    </div>

                </div><!-- 
                <hr>
                <div>
                    
                    <div class="form-group" style="text-align:justify;">
                        <label for="email">Abonnez-vous !</label><br/>
                        <p style="font-size:14px;">Abonnez-vous pour être au courant des modifications et des suppressions de cours.</p>
                        
                        
                        <div class="input-group" style="margin-top:10px;">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Votre email">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="S'abonner"><i class="fa fa-paper-plane" ></i></button>
                            </span>
                        </div>
                    </div>
                </div> -->
                <hr>

                <div style="font-size:14px;">Passez votre souris ou cliquez sur un événement pour voir les détails.</div>

                <div class="form-group event-info eif eif2">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalGen">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Exporter votre calendrier</h4>
            </div>
            <div class="modal-body">
                <h2>Calendrier à intégrer dans votre application</h2>
                <p class="lead">Les calendriers correspondant à votre sélection ont été générés. Vous pouvez maintenant les importer dans votre application de calendrier préférée.</p>
                <p>
                    <ul>
                        <li><strong>Google Calendar</strong> : <a href="#result" data-toggle="modal" data-target="#modalGoogle">comment faire ?</a></li>
                        <li><strong>iCal</strong> : <a href="#result" data-toggle="modal" data-target="#modalMac">comment faire ?</a></li>
                    </ul>
                </p>
                <div id="urlList">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalGoogle">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title name">Google Calendar</h4>
            </div>
            <div class="modal-body">
                <p>1. <strong>Accédez</strong> au site <strong><a href="https://calendar.google.com/" target="_blank">https://calendar.google.com/</a></strong>.</p>
                <p>2. <strong>Connectez-vous</strong> à votre compte Google si ce n'est pas déjà fait.</p>
                <p>3. Dans le menu de gauche, à côté de "Autres agendas", cliquez sur la flèche, puis sur <strong>Ajouter par URL</strong>.</p>
                <p><img src="img/google1.png" class="img-responsive" style="border:1px solid #333;"></p>
                <p>4. <strong>Entrez</strong> l'URL générée précédemment, puis cliquez sur "Ajouter".</p>
                <br/>
                <p class="bg-warning">Note : Google Agenda synchronise le calendrier toutes les 24 heures environ.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalMac">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title name">iCal</h4>
            </div>
            <div class="modal-body">
                <h2>Sur iOS :</h2>
                <p>1. Allez dans <strong>Réglages</strong>, puis dans <strong>Mails, Contacts, Calendrier</strong>.</p>
                <p>2. Choisissez "Ajouter un compte", puis "Autre", puis "Ajouter un calendrier avec abonnement".</p>
                <p>3. Dans la zone <strong>Serveur</strong>, entrez l'URL générée précédemment, puis cliquez sur "Suivant", puis "Enregistrer".</p>
                <h2>Sur Mac OS :</h2>
                <p>1. Allez dans <strong>Fichier</strong>, puis <strong>Nouvel abonnement Calendrier...</strong>.</p>
                <p>2. Dans la zone "URL du calendrier", entrez l'URL générée précédemment, puis cliquez sur "S'abonner".</p>
                <p>3. Dans "Actualisation automatique", choisissez la fréquence d'actualisation souhaitée. Cliquez sur "OK".</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="modalInfos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body eif">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    // migration to the new system
    if(getUrlParameter('ets') !== undefined){
        Cookies.set('popup-migration-v1', true, { expires: 365 });
        redirectIndex();
    }

    var actualUniversity = getUrlParameter('university');
    var actualGrade = getUrlParameter('grade');
    var actualGroup = getUrlParameter('group');

    var data;

    var tmpls_url = null;
    var tmpls_infos = null;
    

    var weopt = true;

    // check if we have parameters
    if(actualUniversity == undefined || actualGrade == undefined){ // pas d'entrée URL
        if(Cookies.getJSON('lastCalendar') == undefined){ // Pas de cookie
            redirectIndex();
        }
        else{
            lastCalendar = Cookies.getJSON('lastCalendar');
            if(lastCalendar.university != undefined && lastCalendar.grade != undefined && lastCalendar.group != undefined){
                actualUniversity = lastCalendar.university;
                actualGrade = lastCalendar.grade;
                actualGroup = lastCalendar.group;
            }
            else{
                redirectIndex();
            }
        }
    }

    function redirectIndex(){
        window.location.href = "index.php";
    }

    var forceReload = false;
    if(getUrlParameter('forceReload') == "true"){
        forceReload = true;
    }

    function renderSelect(){
        $('.select-app').selectpicker('destroy');
        $('.select-app').selectpicker({});
    }

    function disableGenButton(){
        $("#submitformgen").prop("disabled",true);
        $("#submitformgen").prop("data-original-title","Rechargez le calendrier pour pouvoir exporter");
    }

    function enableGenButton(){
        $("#submitformgen").prop("disabled",false);
        $("#submitformgen").prop("data-original-title","Exporter votre calendrier");
    }

    function updateInfos(event){
        if(tmpls_infos == null){
            $.get("./tmpls/infos.html", { "_": $.now() }, function(text){ tmpls_infos = text; showInfos(text, event);
            });
        }
        else{
            showInfos(tmpls_infos, event);
        }
        
    }

    function showInfos(template, event){
        var tmp = _.template(template);
        $(".eif").html(tmp({event: event}));
        $("#modalInfos .modal-title").html(event.title);
    }

    function refreshTimeCalendar(showWeekend){
        $('#calendar').fullCalendar({
            locale:'fr',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour'
            },
            views: {
                week: {
                    columnFormat: 'ddd DD/MM'
                }
            },
            eventMouseover: function(event, jsEvent, view){
                updateInfos(event);
            },
            eventMouseout: function(event, jsEvent, view){
                $(".eif2").html("");
            },
            eventClick: function(event, jsEvent, view){
                updateInfos(event);
                $("#modalInfos").modal('show');
            },
            eventRender: function(event, element) { 
                element.find('.fc-title').append("<div class=\"title-location\"><i class=\"fa fa-map-marker\"></i>" + event.location + "</span>"); 
            },
            height:$(window).height(),
            weekends: showWeekend,
            allDayText:'journée',
            defaultView:'agendaWeek',
            minTime: '08:00:00',
            maxTime: '19:00:00',
            timeFormat:'H:mm',
            slotLabelFormat:"H[h](mm)"
        });
    }

    $("#submitformrel").click(function(){ 
        reloadCalendar();
    });

    $("#submitformfav").click(function(){
        alert("Vous pouvez ajouter cette page à vos favoris afin d'accéder plus rapidement à votre calendrier.");
    });

    // On selectpicker change
    $("#grouplist").change(function(){
        disableGenButton();
        actualGroup = $("#grouplist").val().join();
    });

    $("#submitformgen").click(function(){ // generate links
        if(tmpls_url == null){
            $.get("./tmpls/url.html", { "_": $.now() }, function(text){ tmpls_url = text; generateLinks(text); });
        }
        else{
            generateLinks(tmpls_url);
        }
    });

    function generateLinks(template){
        var groups = actualGroup.split(",");
        group_result = [];
        group_result_unique = [];
        for(i in data.grouplist){
            if($.inArray(data.grouplist[i].id, groups) > -1){
                var urladd = "";

                // Ne pas ajouter les calendriers custom dans l'URL unique
                if(data.grouplist[i].custom == false){
                    urladd = generateUrl(data.university, data.grouplist[i].calid);

                    // On ajoute dans l'URL unique
                    group_result_unique.push(data.grouplist[i].calid);
                }
                else{
                    urladd = data.grouplist[i].url;
                }
                group_result.push({title: data.grouplist[i].name, url: urladd});

            }
        }

        var tmp = _.template(template);
        $("#urlList").html(tmp({group_result: group_result, unique: generateUrl(data.university, group_result_unique)}));
        

        $("#modalGen").modal('show');
    }

    function reloadCalendar(){
        $("#submitformrel").prop("disabled",true);
        $("#submitformrel").tooltip('hide');
        $("#submitformrel i").addClass("fa-spin");
        disableGenButton();

        // Update page titles
        $("#nivTitle").html(data.grade.name);
        var $el = $("#grouplist");
        var actualGroupSplit = actualGroup.split(",");
        $el.empty();
        $.each(data.grouplist, function(key,grp){ //for each group
            var s = "";
            if($.inArray(grp.id.toString(), actualGroupSplit) > -1){
                s = " selected";
            }
            $el.append($("<option" + s + "></option>")
                .attr("value", grp.id).text(grp.name));
        });

        $.post("events.json.php", { "university":actualUniversity, "grade":actualGrade, "group":actualGroup }, function(text){
            var datajson = JSON.parse(text);
            $('#calendar').fullCalendar('removeEventSources');
            $('#calendar').fullCalendar('addEventSource', datajson);
            $("#submitformrel").prop("disabled",false);
            $("#submitformrel i").removeClass("fa-spin");

            // add cookie
            Cookies.set('lastCalendar', {university: actualUniversity, grade: actualGrade, group: actualGroup}, { expires: 365 });

            enableGenButton();
            window.history.replaceState('Calendrier', data.grade.name, 'index.php?p=calendar&university=' + data.university.code + '&grade=' + data.grade.id + '&group=' + actualGroup);
        });
        renderSelect();
    }

    $(function(){

        $('[data-toggle="tooltip"]').tooltip({trigger: 'hover'});

        getUniversityAndGrade(actualGrade, function(university, grade, grouplist){
            data = {university: university, grade: grade, grouplist: grouplist};

            if(data.grade.weekend !== undefined){
                weopt = (data.grade.weekend == true);
            }

            // Show next week if grade has no weekend lesson
            if((moment().day() == 6 || moment().day() == 0) && weopt){
                $('#calendar').fullCalendar('next');
            }

            refreshTimeCalendar(weopt);

            reloadCalendar();

            
        });
    });
</script>