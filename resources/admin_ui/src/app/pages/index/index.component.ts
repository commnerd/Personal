import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../services/api.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {
  stats$!: Observable<any>;

  constructor(
    private api: ApiService
  ){}

  ngOnInit(): void {
    this.stats$ = this.api.get('/api/site_stats');
  }
}
