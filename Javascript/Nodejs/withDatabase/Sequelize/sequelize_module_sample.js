// Sequelize is Object Relational Mapping(ORM) which can help developer easily to get data from database whitout SQL statement.

const Sequelize = require('sequelize');
// connection sample
const sequelize = new Sequelize('test','root','',{
    host: 'localhost',
    dialect:'mysql'
});

// test connection success or not
sequelize.authenticate().then(() => {
    console.log('Connected')
}).catch(err =>{
    console.error('Connect failed');
})

// Define data module
const Categoty = sequelize.define('category', {
    id:Sequelize.UUID,           // unique id
    name:Sequelize.STRING,       // simple way to set data type
    type: {                      // or you can use object way to define more restrain
        type: Sequelize.STRING,  
        allowNull: false,        // not null
        unique: true
    },
    data:{
        type: Sequelize.DATE,
        defaultValue: Sequelize.NOW     // current time
    },
    
    // Sequelize provide the getter and setter, just like this:
    title:{
        title : Sequelize.STRING,
        get() {
            const name = this.getDataValue('name');
            return `My name is ${name}`;
        },
        set (val){
            this.setDataValue('title',val.toUpperCase());
        }
        
    }
},{
    timestamps: false,           // by default sequelize will create the "createAt" and "updateAt" header in table，you can cancel it by this way
    updatedAt:'updateTimestamp', // use updateTimestamp replace the createAt
    tableName: 'my_product'      // modify the created table call my_product
});

// sync all the module
sequelize.sync().then(() => {
    console.log("sync success");
}).catch(err =>{
    console.log("sync faile");
})

// or just update some specific module
// Categoty.sync();
// or 
// Categoty.sync({force: true}); // force: if the table alreadly existence, it will delete the exist table first
