import { Paginated } from "../app/interfaces/laravel/paginated";
import { Link } from "../app/interfaces/laravel/link";

export class TestDataPaginator<DataType> {
    
    pageTemplate: Paginated<DataType> = {
        current_page: 0,
        data: [],
        first_page_url: '',
        from: null,
        last_page: 0,
        last_page_url: '',
        links: [],
        next_page_url: null,
        path: '',
        per_page: 0,
        prev_page_url: '',
        to: null,
        total: 0,
    };

    constructor(
        private data: Array<DataType>
    ) {}

    get(): Paginated<DataType> {
        this.pageTemplate.data = this.data;
        this.pageTemplate.total = this.data.length;
        if(this.data.length > 0) {
            this.pageTemplate.current_page = 1;
            this.pageTemplate.first_page_url = '1';
            this.pageTemplate.from = 1;
            this.pageTemplate.last_page = 1;
            this.pageTemplate.last_page_url = '1';
            this.pageTemplate.path = '1';
            this.pageTemplate.per_page = this.data.length;
            this.pageTemplate.to = this.data.length;
        }
        return this.pageTemplate;
    }
}