import {PageLink} from "@interfaces/api/page-link";

export interface PagedResponse<T> {
  current_page: number;
  data: T[];
  first_page_url: string;
  from: number;
  last_page: number;
  last_page_url: number;
  links: PageLink[];
  next_page_url?: string;
  path: string;
  per_page: number;
  prev_page_url?: string;
  to: number;
  total: number;
}
