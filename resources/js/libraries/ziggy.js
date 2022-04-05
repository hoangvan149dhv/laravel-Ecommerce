const Ziggy = {"url":"http:\/\/laravel.local","port":null,"defaults":{},"routes":{"media.store":{"uri":"media","methods":["POST"]},"home.index":{"uri":"\/","methods":["GET","HEAD"]},"admin.login.showForm":{"uri":"admin\/login","methods":["GET","HEAD"]},"admin.login":{"uri":"admin\/login","methods":["POST"]},"admin.logout":{"uri":"admin\/logout","methods":["POST"]},"admin.register.showForm":{"uri":"admin\/register","methods":["GET","HEAD"]},"admin.register":{"uri":"admin\/register","methods":["POST"]},"admin.home":{"uri":"admin","methods":["GET","HEAD"]},"admin.category.index":{"uri":"admin\/category","methods":["GET","HEAD"]},"admin.category.create":{"uri":"admin\/category\/create","methods":["GET","HEAD"]},"admin.category.store":{"uri":"admin\/category","methods":["POST"]},"admin.category.show":{"uri":"admin\/category\/{category}","methods":["GET","HEAD"]},"admin.category.edit":{"uri":"admin\/category\/{category}\/edit","methods":["GET","HEAD"]},"admin.category.update":{"uri":"admin\/category\/{category}","methods":["PUT","PATCH"]},"admin.category.destroy":{"uri":"admin\/category\/{category}","methods":["DELETE"]},"admin.product.index":{"uri":"admin\/product","methods":["GET","HEAD"]},"admin.product.create":{"uri":"admin\/product\/create","methods":["GET","HEAD"]},"admin.product.store":{"uri":"admin\/product","methods":["POST"]},"admin.product.show":{"uri":"admin\/product\/{product}","methods":["GET","HEAD"]},"admin.product.edit":{"uri":"admin\/product\/{product}\/edit","methods":["GET","HEAD"]},"admin.product.update":{"uri":"admin\/product\/{product}","methods":["PUT","PATCH"]},"admin.product.destroy":{"uri":"admin\/product\/{product}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
