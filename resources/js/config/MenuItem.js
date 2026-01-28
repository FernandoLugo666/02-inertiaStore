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
        route: '/post'
    },
    {
        label: 'Extra',
        icon: 'pi pi-book',
        route: '/post'
    }
]