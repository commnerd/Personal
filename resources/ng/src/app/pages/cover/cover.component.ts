import { Component, OnInit } from '@angular/core';
import { map } from "rxjs/internal/operators";
import { Observable, of } from "rxjs";

import { Quote } from "@models/quote";
import { ApiService } from "@services/api.service";
import { PagedResponse } from "@interfaces/api/paged-response";

@Component({
  selector: 'app-cover',
  templateUrl: './cover.component.html',
  styleUrls: ['./cover.component.scss']
})
export class CoverComponent implements OnInit {

  constructor(private api: ApiService) { }

  quote$: Observable<Quote> = of();

  ngOnInit(): void {
    this.quote$ = this.api.resource["quotes"].list!().pipe(
      map((page: PagedResponse<Quote>) => page.data[Math.floor(Math.random() * (page.data.length - 1))])
    )
  }

}
