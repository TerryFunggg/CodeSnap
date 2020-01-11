module.exports = {
    login: async (name,passwd) => {
        let data;
        if(name == 'abc' && passwd == '123'){
            data = `Hello ${name} !`;
        }else{
            data = "error user info";
        }

        return data;
    }
}
