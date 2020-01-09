const Koa = require('koa');
const Router = require('koa-router');
const app = new Koa();
const router = new Router();

router
    .get('/', async (ctx,next) => {
        ctx.body = '<h1>Hi</h1>';
        await next();
    })

    .post('/users',async (ctx,next) => {
        ctx.body = 'add a usr';
    })

    .put('/users/:id', async (ctx,next) => {
        ctx.body = `modify the user ${ctx.params.id} info`;
    })

    .del('/users/:id', async(ctx,next) =>{
        ctx.body = `delete the user ${ctx.params.id}`;
    })

   // .all('/*', async (ctx , next)) The '*' allow all url request 
    .all('/', async(ctx,next) =>{
        console.log("all method");
        await next();
    })

app.use(router.routes());

app.listen(3000, ()=>{
    console.log("The server start");
});
  
