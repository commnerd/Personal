import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../services/api.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {
  stats!: any;

  constructor(
    private api: ApiService
  ){}

  ngOnInit(): void {
    let subscription = this.api.get('/api/site_stats').subscribe(value => {
      this.stats = value;
      subscription.unsubscribe();
    });
  }
}
