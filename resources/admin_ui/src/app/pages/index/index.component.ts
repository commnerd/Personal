import { Component, OnInit, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ApiService } from '../../services/api.service';
import { PartialsModule } from '../../partials/partials.module';
import {first} from "rxjs";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss'],
  standalone: true,
  imports: [PartialsModule]
})
export class IndexComponent implements OnInit {
  stats!: any;

  constructor(
    private api: ApiService
  ){}

  ngOnInit(): void {
    this.api.get('/api/site_stats', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}).pipe(first()).subscribe(value => {
      this.stats = value;
    });
  }
}
