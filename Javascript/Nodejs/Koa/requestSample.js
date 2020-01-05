const koa = require('koa');
const app = new koa();

app.use(async (ctx) => {
    ctx.response.status = 200;
    // you can try to use this command in console to test post
    //curl -d "search=food&number=12" http://localhost:3000/
    if(ctx.request.method == 'POST'){
        let postData = '';
        ctx.req.on('data',(data) => { // listen event
            postData += data;
        });
        ctx.req.on('end',() => {
            console.log(postData);
        });
    }
    else if(ctx.request.method == "GET"){
        ctx.response.type = 'json';
        ctx.response.body = {
            utl:ctx.request.url,
            queryString:ctx.request.querystring,
            query:ctx.request.query,
        };
    }else{
        ctx.response.body = "<h1> error </h1>";
    }
});

app.listen(3000);
