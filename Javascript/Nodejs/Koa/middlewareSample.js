const koa = require('koa');
const app = new koa();

app.use(async (ctx,next) => {
    let startTime = new Date().getTime();
    await next();
    let endTime = new Date().getTime();
    ctx.response.type = 'text/html';
    ctx.response.body = "Hello";
    console.log(`${ctx.path}, time: ${ endTime - startTime}`);
});

app.use(async (ctx,next)=>{
    console.log('I will be show after startTime was created');
    await next();
    console.log('I will be show after app.listen');
})

app.listen(3000,()=>{
    console.log('server is running!')
})
