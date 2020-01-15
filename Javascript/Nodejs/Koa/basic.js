const koa = require('koa');
const app = new koa();

app.use(async (ctx,next)=>{
    await next();
    ctx.response.type = 'text/html';
    ctx.response.body = '<h1>hello!</h1>';
    
})

app.listen(3000 , ()=>{
    console.log('server is running.')
})
