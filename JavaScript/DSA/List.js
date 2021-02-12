function List(){
  this.size = 0;
  this.pos = 0;
  this.dataStore = [];
  this.clear = clear;
  this.find = find;
  this.toString = toString;
  this.append = append;
  this.remove = remove;
  this.front = front;
  this.end = end;
  this.prev = prev;
  this.next = next;
  this.length = length;
  this.currPos = currPos;
  this.moveTo = moveTo;
  this.getElement = getElement;
  this.contains = contains;
}

function append(element){
  this.dataStore[this.size++] = element
}

function find(element){
  for(let i = 0; i < this.dataStore.length; i++){
    if(this.dataStore[i] == element){
      return i;
    }
  }
  return -1;
}

function remove(element){
  foundAt = this.find(element)
  if(foundAt > -1){
    this.dataStore.splice(foundAt,1);
    --this.size;
    return true;
  }
  return false;
}

function length(){return this.size;}

function toString(){ return this.dataStore; }

function insert(element, after){
  var insertPos = this.find(after);
  if(insertPos > -1){
    this.dataStore.splice(insertPos + 1, 0, element);
    ++this.size;
    return true;
  }
  return false;
}

function clear(){
  delete this.dataStore;
  this.dataStore = [];
  this.size = this.pos = 0;
}

function contains(element){
  for(let i = 0; i < this.dataStore.length; ++i){
    if(this.dataStore[i] == element){
      return true;
    }
  }
  return false;
}

// Traversing a list
function front(){ this.pos = 0;}

function end(){ this.pos = this.size - 1; }

function prev(){
  if(this.pos > 0){
    --this.pos;
  }
}

function next(){ ++this.pos;}

function currPos(){ return this.pos; }

function moveTo(position){ this.pos = position; }

function getElement(){return this.dataStore[this.pos]; }


var names = new List();
names.append("Clayton");
names.append("Raymond");
names.append("Cynthia");
names.append("Jennifer");
names.append("Bryan");
names.append("Danny");


// Iterating through a list

for(names.front(); names.currPos() < names.length(); names.next()){
  console.log(names.getElement());
}
