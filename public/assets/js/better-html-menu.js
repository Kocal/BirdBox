BetterHTMLMenu = function(selector) {
    var menus = document.querySelectorAll(selector);

    BetterHTMLMenu.drawDropDownMenus(menus);
    BetterHTMLMenu.setCurrentAttribute();
}

BetterHTMLMenu.drawDropDownMenus = function(menus) {
    var links = BetterHTMLMenu.getLinks(menus);

    for(var i = menus.length; i--;) {
        var menu = menus[i],
            nav = document.createElement('nav'),
            select = document.createElement('select');

        nav.classList.add('betterhtmlmenu-' + i);

        select.addEventListener('change', function() {
            window.location = this.children[this.selectedIndex].getAttribute('data-href');
        }, false);

        for(var url in links[i]) {
            var text = links[i][url],
                option = document.createElement('option');

            option.setAttribute('data-href', url);
            option.textContent = text;

            // select.prependChild(option);
            select.insertBefore(option, select.firstChild);
        }

        nav.appendChild(select);
        menu.parentNode.insertBefore(nav, menu);
    }
}

BetterHTMLMenu.getLinks = function(menus) {
    var links = {};

    for(var i = menus.length; i--;) {
        var menu = menus[i],
            href = menu.querySelectorAll('a');

        links[i] = {};

        for(var j = href.length; j--;) {
            links[i][href[j].getAttribute('href')] = href[j].textContent;
        }
    }

    return links;
}

BetterHTMLMenu.setCurrentAttribute = function() {
    var options = document.querySelectorAll('[class^="betterhtmlmenu"] option');

    for(var i = options.length; i--;) {
        var href = options[i].getAttribute('data-href');

        if(href == location.hash || href == '/' + location.href.split('/').pop().replace(/\#.*/, '')) {
            options[i].setAttribute('selected', '');
        }
    }
}
/**
 * Created by p1402118 on 16/06/2015.
 */
