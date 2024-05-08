import { Component } from '@angular/core';
import { Observable } from "rxjs";
import { ActivatedRoute } from "@angular/router";
import { EmploymentRecord } from "@interfaces/employment-record";
import { EmploymentRecordService } from "@services/models/employment-record.service";

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent {
  employmentRecord$!: Observable<EmploymentRecord | null>;

  constructor(
    private employmentRecordService: EmploymentRecordService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    let paramSubscriber = this.route.params.subscribe(params => {
      this.employmentRecord$ = this.employmentRecordService.get(params['id'] as number);
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }
}
