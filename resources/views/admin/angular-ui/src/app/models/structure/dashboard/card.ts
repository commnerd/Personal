import { Link } from '../navigation/link';

export class DashboardCard {
    title!: string;
    content!: string;
    links!: Array<Link>;
    image?: Link;
    cols!: number;
    rows!: number;

    constructor(title: string = '', content: string = '', links: Link | Array<Link> = [], image?: Link) {
        this.title = title;
        this.content = content;
        this.links = Array.isArray(links) ? links : [ links ];
        if(image) {
            this.image = image;
        }
        this.cols = 1;
        this.rows = 1;
    }
}