export const menuItems = [
    {
        label: 'Dashboard',
        icon: 'pi pi-tags',
        route: '/dashboard'
    },
    {
        label: 'Category',
        icon: 'pi pi-folder',
        subItems: [


            {
                label: 'Categorias',
                icon: 'pi pi-list',
                route: '/category/list-category'
            },
            {
                label: 'Crear Categoria',
                icon: 'pi pi-list',
                route: '/category/create-view'
            },
        ]
    },
    {
        label: 'Posts',
        icon: 'pi pi-book',
        route: '/post',
        subItems: [
            {
                label: "Lista de Posts",
                icon: "pi pi-list",
                route: '/post/post-list'
            },
            {
                label: "Crear Posts",
                icon: "pi pi-list",
                route: '/post/create-post'
            }
        ]
    },
    {
        label: 'Contactos',
        icon: 'pi pi-address-book',
        route: '/contact',
        subItems: [
            {
                label: "Lista de contactos",
                icon: 'pi pi-list',
                route: '/contact/general'

            }
        ]
    }, {
        label: 'Compañias',
        icon: "pi pi-building",
        route: '/company',
        subItems: [
            {
                label: "Lista de compañias",
                icon: 'pi pi-list',
                route: '/company/list-company'
            }
        ]

    }
]