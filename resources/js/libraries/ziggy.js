const Ziggy = {"url":"http:\/\/laravel.local","port":null,"defaults":{},"routes":{"media.store":{"uri":"media","methods":["POST"]},"admin.login.showForm":{"uri":"admin\/login","methods":["GET","HEAD"]},"admin.login":{"uri":"admin\/login","methods":["POST"]},"admin.logout":{"uri":"admin\/logout","methods":["POST"]},"admin.register.showForm":{"uri":"admin\/register","methods":["GET","HEAD"]},"admin.register":{"uri":"admin\/register","methods":["POST"]},"admin.home":{"uri":"admin","methods":["GET","HEAD"]},"admin.categories.index":{"uri":"admin\/categories","methods":["GET","HEAD"]},"admin.categories.create":{"uri":"admin\/categories\/create","methods":["GET","HEAD"]},"admin.categories.store":{"uri":"admin\/categories","methods":["POST"]},"admin.categories.show":{"uri":"admin\/categories\/{category}","methods":["GET","HEAD"],"bindings":{"category":"id"}},"admin.categories.edit":{"uri":"admin\/categories\/{category}\/edit","methods":["GET","HEAD"]},"admin.categories.update":{"uri":"admin\/categories\/{category}","methods":["PUT","PATCH"],"bindings":{"category":"id"}},"admin.categories.destroy":{"uri":"admin\/categories\/{category}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
