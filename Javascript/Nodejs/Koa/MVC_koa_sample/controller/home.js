const HomeService = require('../service/home');
module.exports = {
    index: async (ctx,next) => {
        ctx.response.body = `<h1>index page</h1>` ;
    },

    home: async (ctx,next) => {
        console.log(ctx.request.query);
        console.log(ctx.request.queryString);
        ctx.response.body = `<h1>Home page</h1>`;
    },

    homeParams: async (ctx, next) => {
        console.log(ctx.params);
        ctx.response.body = '<h1>home/:id/:name</h1>';
    },

    user: async (ctx, next) => {
        ctx.response.body = `
<form action="/user/login" method="POST">
  <p>User name</p>
  <input name="name" type="text" value=""/>
  <p>Password</p>
  <input name="passwd" type="password" value=""/>
  <button type="submit">submit</button>
</form>
`;
    },

    login: async (ctx,next) => {
        let {name , passwd} = ctx.request.body;
        let data = await HomeService.login(name,passwd);
        ctx.response.body = data; 
    }
}
