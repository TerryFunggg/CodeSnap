
const logger = function(appen,layout,name,level,message){
    const appenders = {
        'alert': new Log4js.JSAlertAppender(),
        'console':new Log4js.BrowserConsoleAppender()
    };
    const layouts = {
        'basic': new Log4js.BasicLayout(),
        'json':new Log4js.JSONLayout(),
        'xml':new Log4js.XMLLayout()
    };
    const appender = appenders[appen];
    appender.setLayout(layouts[layout]);
    const logger = new Log4js.getLogger(name);
    logger.addAppender(appender);


    logger.log(level,message,null);
}

const alert_log = R.curry(logger)('alert','json','FJS');
//alert_log('ERROR','Error!!!!!!!!');
const console_log = _.curry(logger)('console','json','console');

console_log("Info","Test error");

console_log(Log4js.Level.ERROR,"Here is debug")