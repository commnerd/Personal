import { Component, OnInit } from '@angular/core';
import { LoadToggleService } from '../../services/load-toggle.service';

import { Observable } from 'rxjs';

@Component({
  selector: 'app-loading',
  templateUrl: './loading.component.html',
  styleUrls: ['./loading.component.scss']
})
export class LoadingComponent implements OnInit {

  state$!: Observable<boolean>;

  constructor(
    private loadToggleService: LoadToggleService
  ) {}

  ngOnInit(): void {
    this.state$ = this.loadToggleService.state();
  }
}
