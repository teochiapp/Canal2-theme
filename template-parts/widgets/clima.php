<div id="m-booked-weather-bl250-69540" style="margin: 20px;">
    <div class="booked-wzs-250-175 weather-customize" style="width:265px;" id="width1">
        <div class="booked-wzs-250-175_in">
            <div class="booked-wzs-250-175-data">
                <div class="booked-wzs-250-175-left-img wrz-03"> </div>
                <div class="booked-wzs-250-175-right">
                    <div class="booked-wzs-day-deck">
                        <div class="booked-wzs-day-val">
                            <div class="booked-wzs-day-number"><span class="plus">+</span>20</div>
                            <div class="booked-wzs-day-dergee">
                                <div class="booked-wzs-day-dergee-val">&deg;</div>
                                <div class="booked-wzs-day-dergee-name">C</div>
                            </div>
                        </div>
                        <div class="booked-wzs-day">
                            <div class="booked-wzs-day-d">H: <span class="plus">+</span>24&deg;</div>
                            <div class="booked-wzs-day-n">L: <span class="plus">+</span>12&deg;</div>
                        </div>
                    </div>
                    <div class="booked-wzs-250-175-info">
                        <div class="booked-wzs-250-175-city smolest">Villa del Rosario </div>
                        <div class="booked-wzs-250-175-date">Viernes, 06 Octubre</div>
                        <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">Previsión para 7 días</span> </div>
                    </div>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250">
                <tr>
                    <td>Sáb</td>
                    <td>Dom</td>
                    <td>Lun</td>
                    <td>Mar</td>
                    <td>Mié</td>
                    <td>Juv</td>
                </tr>
                <tr>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-18"></div>
                    </td>
                    <td class="week-day-ico">
                        <div class="wrz-sml wrzs-01"></div>
                    </td>
                </tr>
                <tr>
                    <td class="week-day-val"><span class="plus">+</span>25&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>24&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>24&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>27&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>20&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>17&deg;</td>
                </tr>
                <tr>
                    <td class="week-day-val"><span class="plus">+</span>13&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>12&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>12&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>14&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>12&deg;</td>
                    <td class="week-day-val"><span class="plus">+</span>6&deg;</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    var css_file = document.createElement("link");
    var widgetUrl = location.href;
    css_file.setAttribute("rel", "stylesheet");
    css_file.setAttribute("type", "text/css");
    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);

    function setWidgetData_69540(data) {
        if (typeof(data) != 'undefined' && data.results.length > 0) {
            for (var i = 0; i < data.results.length; ++i) {
                var objMainBlock = document.getElementById('m-booked-weather-bl250-69540');
                if (objMainBlock !== null) {
                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                    objMainBlock.innerHTML = data.results[i].html_code;
                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                }
            }
        } else {
            alert('data=undefined||data.results is empty');
        }
    }
    var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=w605363;type=3;scode=65321;ltid=3457;domid=582;anc_id=21183;countday=undefined;cmetric=1;wlangID=4;color=137AE9;wwidth=265;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";
    widgetSrc += ';ref=' + widgetUrl;
    widgetSrc += ';rand_id=69540';
    var weatherBookedScript = document.createElement("script");
    weatherBookedScript.setAttribute("type", "text/javascript");
    weatherBookedScript.src = widgetSrc;
    document.body.appendChild(weatherBookedScript)
</script>