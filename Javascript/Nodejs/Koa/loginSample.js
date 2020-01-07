const koa = require('koa');
const app = new koa();
const bodyParser = require('koa-bodyparser');
const Router = require('koa-router');
const router = new Router();

router.get('/', (ctx , next) => {
    ctx.type = 'html';
    let html = `
<h1>Login</h1>
<form action="/" method="POST">
  <p>User name</p>
  <input name="userName" type="text" value=""/>
  <p>Password</p>
  <input name="password" type="password" value=""/>
  <button type="submit">submit</button>
</form>
`;
    ctx.body = html;

});

router.post('/', (ctx, next) =>{
        let postData = ctx.request.body;
        ctx.body = postData;
})

app
    .use(bodyParser())
    .use(router.routes())
    .use(router.allowedMethods());


app.listen(3000);
