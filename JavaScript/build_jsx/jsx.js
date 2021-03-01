/*
 * like JSX builder
 */
function h(nodeName, attributes, ...args){
  let children = args.length ? [...args] : null;
  return { nodeName, attributes, children };
}

/*
 * An example show that how to use this h function
 */
let example = h('div', { 'id':'name' },
                h('p', {'id':'text'}, 'Test Some thing'));

/*
 * Render JSX into bowser (required babel), or you can try with h function
 */
function render(vnode){
  if(typeof vnode === 'string') return document.createTextNode(vnode);

  let node = document.createElement(vnode.nodeName);
  let attr = vnode.attributes || {};
  Object.keys(attr).forEach( key => node.setAttribute(key, attr[key]));

  (vnode.children || []).forEach(c => node.appendChild(render(c)));

  return node;
}


let vdom = h('div',{"id":"name"}, "Hello")
let dom = render(vdom);
document.body.appendChild(dom);

