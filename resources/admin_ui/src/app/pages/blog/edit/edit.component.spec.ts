import { ComponentFixture, TestBed } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';

import { EditComponent } from './edit.component';
import {HttpClient} from "@angular/common/http";
import {BlogModule} from "@pages/blog/blog.module";
import {RouterTestingModule} from "@angular/router/testing";

describe('EditComponent', () => {
  let component: EditComponent;
  let fixture: ComponentFixture<EditComponent>;
  let httpTestingController: HttpTestingController;
  let httpClient: HttpClient;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule, BlogModule, RouterTestingModule],
      declarations: [EditComponent]
    });
    fixture = TestBed.createComponent(EditComponent);
    httpTestingController = TestBed.inject(HttpTestingController);
    httpClient = TestBed.inject(HttpClient);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
